<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])
                        ->where('users_id', Auth::user()->id)
                        ->get();

        return view('pages.dashboard-products', [
            'products' => $products
        ]);
    }

    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries','user','category'])->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request)
    {
        ProductGallery::create([
            'products_id' => $request->products_id,
            'photos' => $request->file('photos')->store('assets/product', 'public')
        ]);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard-products-create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'users_id' => $request->users_id,
            'categories_id' => $request->categories_id,
            'price' => $request->price,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photos')->store('assets/product', 'public')
        ];
        
        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'users_id' => $request->users_id,
            'categories_id' => $request->categories_id,
            'price' => $request->price,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('dashboard-product');
    }
}
