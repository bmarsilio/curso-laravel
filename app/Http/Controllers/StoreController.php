<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $category_model;
    private $product_model;

    public function __construct(Category $category, Product $product)
    {
        $this->category_model = $category;
        $this->product_model = $product;
    }

    public function index()
    {
        $categories = $this->category_model->all();
        $products_featured = $this->product_model->featured()->get();
        $products_recommended = $this->product_model->recommended()->get();

        return view('store.index', compact('categories', 'products_featured', 'products_recommended'));
    }

    public function indexByCategory($id)
    {
        $categories = $this->category_model->all();
        $products = $this->product_model->where('category_id', $id)->get();
        $product_category = $this->category_model->find($id);

        return view('store.indexByCategory', compact('categories', 'products', 'product_category'));
    }
}
