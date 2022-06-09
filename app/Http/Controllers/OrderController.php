<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\OrderItemCreateRequest;
use App\Http\Requests\OrderItemUpdateRequest;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\HistoryCreateRequest;
use App\Http\Requests\HistoryUpdateRequest;
use App\Models\User;

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

    public function store(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        $code = $validated['code'];
        $authorId = $validated['author_id'];
        Order::create([
            'code' => $code,
            'author_id' => $authorId
        ]);

        /*
        Order::create([
            'code' => $code,
            'author_id' => $author_id
            ]);
        */
        return redirect(route('orders.orders'))->with('success', __('order.create_success'));
    }

    public function storeItem(OrderItemCreateRequest $request)
    {
        $validated = $request->validated();

        $orderId =$validated['order_id'];
        $code = $validated['code'];
        $qty = $validated['qty'];

        OrderItem::create([
            'order_id' => $orderId,
            'code' => $code,
            'qty' => $qty
        ]);
        return redirect(route('orders.order', $orderId));
    }

    public function storeHistory(HistoryCreateRequest $request)
    {
        $validated = $request->validated();
        $orderId = $validated['order_id'];
        $action = $validated['action'];
        $userId = $validated['user_id'];;

        OrderHistory::create([
            'action' => $action,
            'user_id' => $userId
        ]);
        return redirect(route('orders.order', $orderId));
    }

    public function order($id)
    {
        $orderItems = OrderItem::all();
        $historyItems = OrderHistory::all();
        $users = User::all();
        $order = Order::find($id);
        return view('orders.show')
            ->with('order', $order)
            ->with('orderItems', $orderItems)
            ->with('historyItems', $historyItems)
            ->with('users', $users);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Order::destroy($id);
        return redirect(route('orders.orders'))->with('success', __('order.destroy_success'));
    }

    public function editItem(OrderItemUpdateRequest $request)
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
            if ($request->validated()) {
                $order->update([
                    'code' => $code,
                    'qty' => $qty
                ]);
            }
        }
        */
        $validated = $request->validated();
        $orderId = $validated['order_id'];
        $itemId = $validated['item_id'];
        $action =$validated['action'];
        $code = $validated['code'];
        $qty = $validated['qty'];

        if ($action == 'Delete') {
            OrderItem::destroy($itemId);
        } elseif ($action == 'Edit') {
            $orderItem = OrderItem::find($itemId);
            if ($validated) {
                $orderItem->update([
                    'code' => $code,
                    'qty' => $qty
                ]);
            }
        }
        return redirect(route('orders.order', $orderId));
    }

    public function editHistoryItem(HistoryUpdateRequest $request)
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
        $validated = $request->validated();
        $orderId = $validated['order_id'];
        $itemId = $validated['item_id'];
        $action = $validated['action'];
        $historyAction = $validated['history_action'];
        $userId = $validated['user_id'];


        if ($action == 'Delete') {
            OrderHistory::destroy($itemId);
        } elseif ($action == 'Edit') {
            $history = OrderHistory::find($itemId);
            $validated = $request->validated();
            if ($validated) {
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

    public function update(OrderUpdateRequest $request)
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
        /*
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
        */
        $validated = $request->validated();
        $id = $validated['id'];
        $code = $validated['code'];
        $authorId = $validated['author_id'];
        $order = Order::find($id);
        
        if ($validated) {
            $order->update([
                'code' => $code,
                'author_id' => $authorId
            ]);
        }
        return redirect(route('orders.orders'));
    }
}
