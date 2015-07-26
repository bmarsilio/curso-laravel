<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;

class AdminProductsController extends Controller
{
    private $product_model;
    private $category_model;

    public function __construct(Product $product_model, Category $category_model)
    {
        $this->product_model = $product_model;
        $this->category_model = $category_model;
    }

    public function index()
    {
        $products = $this->product_model->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->category_model->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
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
        $categories = $this->category_model->lists('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->product_model->find($id)->update($request->all());

        return redirect()->route('admin.products');
    }
}
