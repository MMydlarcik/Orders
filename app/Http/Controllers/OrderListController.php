<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function orderList() 
    {
        return view('home.orders');
    }
}