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
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|integer',
            'author_id' => 'required',
        ]);

        $code = $request->input('code');
        $author_id = $request->input('author_id');


        Order::create([
            'code' => $code,
            'author_id' => $author_id
        ]);
        return redirect(route('home.orders'))->with('flash_message', 'Order Added!');
    }

    public function order($id)
    {
        $order = Order::find($id);
        return view('home.show')->with('order', $order);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Order::destroy($id);
        return redirect(route('orders.orders'))->with('flash_message', 'Order deleted!');
    }


    public function edit($id)
    {
        $order = Order::find($id);
        return view('home.edit')->with('order', $order);
    }

    public function update(Request $request)
    {   
        $id = $request->input('id');
        $code = $request->input('code');
        $author_id = $request->input('author_id');

        $order = Order::find($id);
        $order->update([
            'code' => $code,
            'author_id' => $author_id
        ]);
        return redirect(route('orders.orders'));
    }
}
