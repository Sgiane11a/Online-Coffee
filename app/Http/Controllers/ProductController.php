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
    public function index()
{
    // Obtener todas las categorías
    $categories = Category::all();

    // Obtener todos los productos
    $products = Product::all();

    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Si el usuario está logueado, se muestran los productos en la vista 'user.products'
        return view('user.products', compact('products', 'categories'));
    }

    // Si el usuario no está logueado, se muestran los productos en la vista 'products'
    return view('products', compact('products', 'categories'));
}


    public function admin(Request $request)
{
    // Obtener todas las categorías
    $categories = Category::all();

    // Comenzar la consulta de productos
    $query = Product::query();

    // Filtrar por nombre si está presente
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filtrar por categoría si está presente
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // Obtener los productos con paginación
    $products = $query->paginate(5);

    // Pasar productos y categorías a la vista
    return view('admin.products.index', compact('products', 'categories'));
}


    function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
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

        return redirect()->route('admin.products.index')->with('success', 'Producto creado exitosamente.');
    }

    function edit(Product $product): View
    {
        $categories = Category::all();
        return view('admin.products.update', compact('product', 'categories'));
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

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado exitosamente.');
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
