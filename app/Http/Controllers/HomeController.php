<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $lastOrders = Order::latest()->take(5)->get();
        $lastUsers = User::latest()->take(5)->get();
        return view('home.index')
            ->with('lastOrders', $lastOrders)
            ->with('lastUsers', $lastUsers);
    }
}