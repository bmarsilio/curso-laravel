<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $category_model;
    private $product_model;
    private $tag_model;

    public function __construct(Category $category, Product $product, Tag $tag)
    {
        $this->category_model = $category;
        $this->product_model = $product;
        $this->tag_model = $tag;
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
        $products = $this->product_model->ofCategory($id)->get();
        $product_category = $this->category_model->find($id);

        return view('store.indexByCategory', compact('categories', 'products', 'product_category'));
    }

    public function indexByProduct($id)
    {
        $categories = $this->category_model->all();
        $product = $this->product_model->find($id);

        return view('store.productDetail', compact('categories', 'product'));
    }

    public function indexByTag($id)
    {
        $categories = $this->category_model->all();
        $product_tag = $this->tag_model->find($id);
        $products = $this->tag_model->find($id)->products()->get();

        return view('store.indexByTag', compact('categories', 'products', 'product_tag'));

    }
}