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
use App\Services\HistoryStoreService;
use App\Services\OrderUpdateService;
use App\Services\HistoryUpdateService;
use App\Services\OrderItemEditService;
use App\Services\OrderItemStoreService;
use App\Services\OrderStoreService;

use function PHPUnit\Framework\returnSelf;

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
        if (auth()->user()->role == 'admin') {
            $users = User::all();
            return view('orders.create')->with([
                'users' => $users
            ]);
        } else return redirect(route('orders.orders'));
    }

    public function store(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        $code = $validated['code'];
        $authorId = $validated['author_id'];
        if (auth()->user()->role == 'admin') {
            $service = new OrderStoreService;
            $order = $service->processRequest($request);
        } else return redirect(route('orders.orders'));
        return redirect(route('orders.orders'))->with('success', __('order.create_success'));
    }

    public function storeItem(OrderItemCreateRequest $request)
    {
        $validated = $request->validated();
        $orderId = $validated['order_id'];

        if (auth()->user()->role == 'admin') {
            $service = new OrderItemStoreService;
            $orderItem = $service->processRequest($request);
            return redirect(route('orders.order', $orderId));
        } else return redirect(route('orders.orders'));
    }

    public function storeHistory(HistoryCreateRequest $request)
    {
        $validated = $request->validated();
        $orderId = $validated['order_id'];

        if (auth()->user()->role == 'admin') {
            $service = new HistoryStoreService;
            $history = $service->processRequest($request);
            return redirect(route('orders.order', $orderId));
        } else return redirect(route('orders.orders'));
    }

    public function order($id)
    {
        //$orderItems = OrderItem::all();
        //$orderItems = OrderItem::where('order_id', '=', $id)->get();
        //$historyItems = OrderHistory::all();
        $users = User::all();
        $order = Order::find($id);

        $orderItems = $order->orderItems;
        $historyItems = $order->historyItems;

        return view('orders.show')
            ->with('order', $order)
            ->with('orderItems', $orderItems)
            ->with('historyItems', $historyItems)
            ->with('users', $users);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (auth()->user()->role == 'admin') {
            Order::destroy($id);
            return redirect(route('orders.orders'))->with('success', __('order.destroy_success'));
        } else return redirect(route('orders.orders'));
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

        if (auth()->user()->role == 'admin') {
            $service = new OrderItemEditService;
            $orderItem = $service->processRequest($request);
            return redirect(route('orders.order', $orderId));
        } else return redirect(route('orders.orders'));
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

        if (auth()->user()->role == 'admin') {
            $service = new HistoryUpdateService;
            $history = $service->processRequest($request);
            return redirect(route('orders.order', $orderId));
        } else return redirect(route('orders.orders'));
    }

    public function edit($id)
    {
        if (auth()->user()->role == 'admin') {
            $order = Order::find($id);
            return view('orders.edit')->with('order', $order);
        } else return redirect(route('orders.orders'));
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
        /*
        $validated = $request->validated();
        $id = $validated['id'];
        $code = $validated['code'];
        $authorId = $validated['author_id'];
        $order = Order::find($id);
        */
        if (auth()->user()->role == 'admin') {
            $service = new OrderUpdateService;
            $order = $service->processRequest($request);
        }
        return redirect(route('orders.orders'));
    }
}
