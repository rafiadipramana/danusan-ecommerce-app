<?php

namespace App\Http\Controllers;

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
            "products" => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'category_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
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
            $product->save();
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
}
