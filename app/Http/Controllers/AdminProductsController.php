<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;

use CodeCommerce\Http\Requests;

class AdminProductsController extends Controller
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function index()
    {
        $products = $this->model->all();

        return view('admin.products', compact('products'));
    }
}
