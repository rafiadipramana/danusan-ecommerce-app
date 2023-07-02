<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::latest();

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        if (request('category')) {
            $query->whereHas('category', function ($q) {
                $q->where('name', request('category'));
            });
        }

        $viewData = [
            "title" => "Produk",
            "subtitle" => "Daftar Produk",
            "products" => $query->paginate(24),
            "categories" => Category::all()
        ];

        return view('product.index')->with("viewData", $viewData);
    }

    public function detail($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->name." - Online Store";
        $viewData["subtitle"] = $product->name." - Product Information";
        $viewData["product"] = $product;
        return view('product.detail')->with("viewData", $viewData);
    }
}
