<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $viewData = [
            "categories" => Category::all(),
        ];
        return view("admin.category.index")->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Category::validate($request);

        $newProduct = new Category();
        $newProduct->setName($request->input('name'));
        $newProduct->save();

        return back();
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [
            "title" => "Admin Page - Edit Product - Online Store",
            "product" => Category::findOrFail($id),
            "categories" => Category::findOrFail($id),
            "name" => Auth::user()->getName()
        ];
        return view('admin.category.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Category::validate($request);

        $product = Category::findOrFail($id);
        $product->setName($request->input('name'));
        $product->save();
        return redirect()->route('admin.category.index');
    }
}
