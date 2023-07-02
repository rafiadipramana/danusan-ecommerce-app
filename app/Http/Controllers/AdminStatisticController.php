<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminStatisticController extends Controller
{
    public function index()
    {
        return view('admin.statistic.index');
    }
}
