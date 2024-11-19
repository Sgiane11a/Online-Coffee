<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', compact('products', 'categories'));
    }

    function admin()
    {
        $products = Product::paginate(5);
        return view('admin.store.products.index', compact('products'));
    }

    function create()
    {
        $categories = Category::all();
        return view('admin.store.products.create', compact('categories'));
    }

    function store(Request $request)
    {
        $uploadedFile = $request->file('file');
        $image_url = null;
        $image_public_id = null;

        if ($uploadedFile) {
            $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
                'folder' => 'Products'
            ]);
            $image_url = $uploadResult->getSecurePath();
            $image_public_id = $uploadResult->getPublicId();
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $image_url,
            'image_public_id' => $image_public_id,
        ]);

        return redirect()->route('admin.store.products.index')->with('success', 'Producto creado exitosamente.');
    }

    function edit(Product $product): View
    {
        $categories = Category::all();
        return view('admin.store.products.update', compact('product', 'categories'));
    }

    function update(Request $request, Product $product): RedirectResponse
    {
        $uploadedFile = $request->file('file');

        if ($uploadedFile) {
            Cloudinary::destroy($product->image_public_id);

            $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
                'folder' => 'Products'
            ]);

            $product->update([
                'image_url' => $uploadResult->getSecurePath(),
                'image_public_id' => $uploadResult->getPublicId(),
            ]);
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.store.products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    function destroy(Product $product): RedirectResponse
    {
        if ($product->image_public_id) {
            Cloudinary::destroy($product->image_public_id);
        }
        $product->delete();
        return  redirect()->back()->with('success', 'Producto eliminado exitosamente.');
    }
}
