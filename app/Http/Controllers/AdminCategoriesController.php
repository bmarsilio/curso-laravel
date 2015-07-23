<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\CategoryRequest;

class AdminCategoriesController extends Controller
{
    private $category_model;

    public function __construct(Category $category_model)
    {
        $this->category_model = $category_model;
    }

    public function index()
    {
        $categories = $this->category_model->all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {

        $inputs = $request->all();

        $this->category_model->fill($inputs)->save();

        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $this->category_model->find($id)->delete();

        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $category = $this->category_model->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->category_model->find($id)->update($request->all());

        return redirect()->route('admin.categories');
    }
}
