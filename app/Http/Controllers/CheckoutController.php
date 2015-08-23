<?php

namespace CodeCommerce\Http\Controllers;

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

    public function __construct(Order $order, OrderItem $orderItem)
    {
        $this->order = $order;
        $this->orderItem = $orderItem;
    }


    public function place()
    {
        if(!Session::has('cart')) {
            return false;
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

            dd($order);
        }
    }
}
