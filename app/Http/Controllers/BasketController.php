<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_products;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    private $basket;
    private $basket_products;

    public function __construct() {
        $this->getBasket();
    }

    /**
     * Показывает корзину покупателя
     */
    public function index() {
        $products = $this->basket->products;
        return view('basket', compact('products'));
    }

    /**
     * Форма оформления заказа
     */
    public function checkout() {
        return view('basket.checkout');
    }

    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request) {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($request->get('product_id'), $quantity);

        $request['basket_items'] = Basket_products::where('basket_id', '=', $request->cookie('basket_id'))->sum('quantity');

        echo json_encode($request->all());
    }

    public function plus(Request $request) {
        $this->basket->increase($request->get('product_id'));
        $request['basket_items'] = Basket_products::where('basket_id', '=', $request->cookie('basket_id'))->sum('quantity');
        echo json_encode($request->all());
    }

    public function minus(Request $request) {
        $this->basket->decrease($request->get('product_id'));
        $request['basket_items'] = Basket_products::where('basket_id', '=', $request->cookie('basket_id'))->sum('quantity');

        echo json_encode($request->all());
    }

    /**
     * Возвращает объект корзины; если не найден — создает новый
     */
    private function getBasket() {
        $basket_id = request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $this->basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $e) {
                $this->basket = Basket::create();
            }
        } else {
            $this->basket = Basket::create();
        }
        Cookie::queue('basket_id', $this->basket->id, 525600);
    }

    public function remove(Request $request) {

        $this->basket->remove($request->get('product_id'));
        $request['basket_items'] = Basket_products::where('basket_id', '=', $request->cookie('basket_id'))->sum('quantity');
        echo json_encode($request->all());
    }

    public function clear() {
        $this->basket->delete();
        return redirect()->route('basket');
    }
}
