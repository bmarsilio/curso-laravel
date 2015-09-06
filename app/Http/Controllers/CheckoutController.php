<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected $order;
    protected $orderItem;
    protected $category;

    public function __construct(Order $order, OrderItem $orderItem, Category $category)
    {
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->category = $category;
    }


    public function place()
    {
        $categories = $this->category->all();

        if(!Session::has('cart')) {

            return view('store.checkout', ['carrinho' => 'empty', 'categories' => $categories]);
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0) {
            $order = $this->order->create(
                [
                    'user_id' => Auth::user()->id,
                    'total' => $cart->getTotal()
                ]
            );

            foreach($cart->all() as $k => $item) {

                $order->items()->create(
                    [
                        'product_id' => $k,
                        'price' => $item['price'],
                        'qtd' => $item['qtd']
                    ]
                );

            }

            $cart->clear();
            $carrinho = 1;

            event(new CheckoutEvent(Auth::user(), $order));

            return view('store.checkout', compact('order', 'categories', 'carrinho'));
        }

    }

}
