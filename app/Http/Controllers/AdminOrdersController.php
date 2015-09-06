<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    protected $order_model;

    public function __construct(Order $order)
    {
        $this->order_model = $order;
    }

    public function index()
    {
        $orders = $this->order_model->orderBy('id')->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function atualizarStatus($order_id, $status_id)
    {
        $order = $this->order_model->find($order_id);
        $order->update(['status' => $status_id]);

        return redirect()->route('admin.orders');
    }
}
