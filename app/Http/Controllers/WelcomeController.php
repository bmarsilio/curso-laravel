<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;

class WelcomeController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function exemplo()
    {

        $categories = $this->category->all();

        return view('auth.auth-check', compact('categories'));
    }
}
