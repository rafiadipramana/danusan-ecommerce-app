<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSaleController extends Controller
{
    public function index()
    {
        return view('admin.sale.index');
    }
}
