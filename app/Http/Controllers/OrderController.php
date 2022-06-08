<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\OrderItemRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\HistoryRequest;

class OrderController extends Controller
{
    public function orderList()
    {
        $orders = Order::all();
        return view('orders.orders')->with([
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->validated());

        /*
        Order::create([
            'code' => $code,
            'author_id' => $author_id
            ]);
        */
        return redirect(route('orders.orders'))->with('success', __('order.create_success'));
    }

    public function storeItem(OrderItemRequest $request)
    {
        /*
        $validated = $request->validate([
            'code' => 'required|integer',
            'qty' => 'required|numeric',
        ]);

        $orderId = $request->input('order_id');
        $code = $request->input('code');
        $qty = $request->input('qty');


        OrderItem::create([
            'order_id' => $orderId,
            'code' => $code,
            'qty' => $qty
        ]);
        */

        $orderId = $request->input('order_id');
        OrderItem::create($request->validated());

        return redirect(route('orders.order', $orderId));
    }

    public function storeHistory(HistoryRequest $request)
    {
        /*
        $validated = $request->validate([
            'action' => 'required',
            'user_id' => 'required|integer',
        ]);

        $orderId = $request->input('order_id');
        $action = $request->input('action');
        $userId = $request->input('user_id');


        OrderHistory::create([
            'action' => $action,
            'user_id' => $userId
        ]);
        */
        $orderId = $request->input('order_id');
        OrderHistory::create($request->validated());

        return redirect(route('orders.order', $orderId));
    }

    public function order($id)
    {
        $orderItems = OrderItem::all();
        $historyItems = OrderHistory::all();
        $order = Order::find($id);
        return view('orders.show')
            ->with('order', $order)
            ->with('orderItems', $orderItems)
            ->with('historyItems', $historyItems);
    }

    public function destroy(Request $request, $id)
    {
        $id = $request->input('id');
        Order::destroy($id);
        return redirect(route('orders.orders'))->with('success', __('order.destroy_success'));
    }

    public function editItem(OrderItemRequest $request)
    {
        /*
        $orderId = $request->input('order_id');
        $itemId = $request->input('item_id');
        $action = $request->input('action');
        $code = $request->input('code');
        $qty = $request->input('qty');

        if ($action == 'Delete') {
            OrderItem::destroy($itemId);
        } elseif ($action == 'Edit') {
            $order = OrderItem::find($itemId);
            $order->update([
                'code' => $code,
                'qty' => $qty
            ]);
        }
        */
        $orderId = $request->input('order_id');
        $itemId = $request->input('item_id');
        $action = $request->input('action');
        $code = $request->input('code');
        $qty = $request->input('qty');

        if ($action == 'Delete') {
            OrderItem::destroy($itemId);
        } elseif ($action == 'Edit') {
            $order = OrderItem::find($itemId);
            if ($request->validated()) {
                $order->update([
                    'code' => $code,
                    'qty' => $qty
                ]);
            }
        }
        return redirect(route('orders.order', $orderId));
    }

    public function editHistoryItem(HistoryRequest $request)
    {
        /*
        $orderId = $request->input('order_id');
        $itemId = $request->input('item_id');
        $action = $request->input('action');
        $historyAction = $request->input('history_action');
        $userId = $request->input('user_id');

        if ($action == 'Delete') {
            OrderHistory::destroy($itemId);
        } elseif ($action == 'Edit') {
            $history = OrderHistory::find($itemId);
            $history->update([
                'action' => $historyAction,
                'user_id' => $userId
            ]);
        }
        */
        $orderId = $request->input('order_id');
        $itemId = $request->input('item_id');
        $action = $request->input('action');
        $historyAction = $request->input('history_action');
        $userId = $request->input('user_id');

        if ($action == 'Delete') {
            OrderHistory::destroy($itemId);
        } elseif ($action == 'Edit') {
            $history = OrderHistory::find($itemId);
            if ($request->validated()) {
                $history->update([
                    'action' => $historyAction,
                    'user_id' => $userId
                ]);
            }
        }
        return redirect(route('orders.order', $orderId));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit')->with('order', $order);
    }

    public function update(OrderRequest $request)
    {
        /*
        $id = $request->input('id');
        $code = $request->input('code');
        $author_id = $request->input('author_id');

        $order = Order::find($id);
        $order->update([
            'code' => $code,
            'author_id' => $author_id
        ]);
        */
        $id = $request->input('id');
        $code = $request->input('code');
        $author_id = $request->input('author_id');

        $order = Order::find($id);
        if ($request->validated()) {
            $order->update([
                'code' => $code,
                'author_id' => $author_id
            ]);
        }
        return redirect(route('orders.orders'));
    }
}
