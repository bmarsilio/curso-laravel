<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index()
    {
        $categories = $this->model->all();

        return view('admin.categories', compact('categories'));
    }
}
