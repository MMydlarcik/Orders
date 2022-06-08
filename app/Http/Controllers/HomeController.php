<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $lastOrders = Order::latest()->take(5)->get();
        return view('home.index')->with('lastOrders', $lastOrders);
    }
}