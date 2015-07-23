<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;

class AdminProductsController extends Controller
{
    private $product_model;

    public function __construct(Product $product_model)
    {
        $this->product_model = $product_model;
    }

    public function index()
    {
        $products = $this->product_model->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $inputs = $request->all();

        $this->product_model->fill($inputs)->save();

        return redirect()->route('admin.products');
    }

    public function destroy($id)
    {
        $this->product_model->find($id)->delete();

        return redirect()->route('admin.products');
    }

    public function edit($id)
    {
        $product = $this->product_model->find($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->product_model->find($id)->update($request->all());

        return redirect()->route('admin.products');
    }
}
