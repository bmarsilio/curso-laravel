<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $product_model;
    private $category_model;
    private $product_image_model;

    public function __construct(Product $product_model, Category $category_model, ProductImage $product_image_model)
    {
        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->product_image_model = $product_image_model;
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

    public function images($id)
    {
        $product = $this->product_model->find($id);

        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product_model->find($id);

        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $this->product_image_model->create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('admin.products.images', ['id' => $id]);
    }

    public function destroyImage($id)
    {
        $image = $this->product_image_model->find($id);

        if(file_exists(public_path().'/uploads'/$image->id.'.'.$image->extension))
        {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;

        $image->delete();

        return redirect()->route('admin.products.images', ['id' => $product->id]);
    }
}
