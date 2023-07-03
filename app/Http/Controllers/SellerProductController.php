<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends Controller
{
    public function index()
    {
        return view('seller.product.index', [
            'products' => Product::where('seller_id', auth()->id())->get(),
            'categories' => Category::all()
        ]);
    }    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        // Buat objek produk baru
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->seller_id = Auth::id();
        $product->description = $request->description;
        $product->price = $request->price;

        // Simpan gambar
        if ($request->hasFile('image')) {
            $imageName = Str::slug($product->name) . '_' . time() . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );

            $product->image = $imageName;
        }

        // Simpan produk ke database
        $product->save();

        return redirect()->route('seller.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }

    public function edit($id)
    {
        return view('seller.product.edit', [
            "product" => Product::findOrFail($id),
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        // Buat objek produk baru
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;

        // Simpan gambar
        if ($request->hasFile('image')) {
            $oldImage = $product->image;
            $imageName = Str::slug($product->name) . '_' . time() . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );

            $product->image = $imageName;

            Storage::disk('public')->delete($oldImage);
        }

        // Simpan produk ke database
        $product->save();

        return redirect()->route('seller.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
