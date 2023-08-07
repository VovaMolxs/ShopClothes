<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Http\Controllers\BasketController;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public $basket;

    public function index() {

        $basket_id = request()->cookie('basket_id');
        if (!empty($basket_id)) {
            $this->basket = Basket::findOrFail($basket_id);
        }
        $products = $this->basket->products;
        return view('checkout', compact('products'));
    }

    public function addOrder(Request $request) {

        $request->validate([
              "first_name" => "required|min:3",
              "last_name" => "required|min:3",
              "cname" => "",
              "billing_address" => "required|min:3",
              "billing_address2" => "",
              "city" => "required|min:3",
              "state" => "required|min:3",
              "zipcode" => "required|numeric|min:5",
              "phone" => "required",
              "email" => "required|email",
              "comment" => "",
              "payment_option" => "required",
        ]);

        // валидация пройдена, сохраняем заказ
        $basket = new BasketController();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $order = Order::create(
            $request->all() + ['amount' => $basket->getAmount(), 'user_id' => $user_id]
        );

        foreach ($basket->products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->title,
                'price' => $product->regular_price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->regular_price * $product->pivot->quantity,
            ]);
        }

        // уничтожаем корзинуBasket::find(request()->cookie('basket_id'))->delete();

        return redirect()
            ->route('checkout.success')
            ->with('order_id', $order->id);

    }

    public function success(Request $request) {
        if ($request->session()->exists('order_id')) {
            // сюда покупатель попадает сразу после успешного оформления заказа
            $order_id = $request->session()->pull('order_id');

            $order = Order::findOrFail($order_id);
            $orderItems = OrderItems::get()->where('order_id', '=', $order_id);


            return view('checkout_success', compact('order', 'orderItems'));
        } else {
            // если покупатель попал сюда случайно, не после оформления заказа,
            // ему здесь делать нечего — отправляем на страницу корзины
            return redirect()->route('basket');
        }
    }
}
