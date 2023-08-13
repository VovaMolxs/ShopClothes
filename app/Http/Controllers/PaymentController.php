<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Models\Order;
use App\Models\Tranzaction;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;

class PaymentController extends Controller
{
    public function index() {

        $order = Order::where('user_id', Auth::user()->id)->get();

        return view('dashboard', compact('order'));
    }

    public function create(Request $request, PaymentService $service) {
        $amount = $request->input('amount');
        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');

        $tranzaction = Tranzaction::create([
            'amount' => $amount,
            'user_id' => $user_id,
            'order_id' => $order_id,
        ]);

        if ($tranzaction) {
            $link = $service->createPayment($amount, [
                'transaction_id' => $tranzaction->id,
            ]);

            return redirect()->away($link);
        }
    }

    public function callback(Request $request, PaymentService $service) {

        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);

        $payment = $notification->getObject();
        \Log::info(json_encode($payment));
        if (isset($payment->status) && $payment->status == "waiting_for_capture") {
            $service->getClient()->capturePayment([
                'amount' => $payment->amount,

            ], $payment->id, uniqid('', true));
        }

        if (isset($payment->status) && $payment->status == "succeeded") {
            if($payment->paid == true) {
                //платеж прошел и подтвержден
                $metadata = $payment->metadata;
                if (isset($metadata->transaction_id)) {
                    $transactionId = $metadata->transaction_id;
                    $transaction = Tranzaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $order = Order::find($transaction->order_id);
                    $order->status = PaymentStatusEnum::CONFIRMED;
                    $order->save();
                    $transaction->save();

                }
            }
        }
    }
}
