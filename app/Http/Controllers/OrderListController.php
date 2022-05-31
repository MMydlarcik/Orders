<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderListController extends Controller
{
    public function orderList() 
    {
        $orders = Order::all();
        return view('home.orders')->with([
            'orders'=> $orders
        ]);
    }
}