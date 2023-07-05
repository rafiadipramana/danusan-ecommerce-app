<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
        ]);

        // Buat objek produk baru
        $category = new Category();
        $category->name = $request->name;
        // Simpan produk ke database
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            "category" => Category::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required'
        ]);

        // Buat objek produk baru
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        // Simpan produk ke database
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
}
