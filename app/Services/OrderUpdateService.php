<?php

namespace App\Services;

use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;

class OrderUpdateService
{
    public function processRequest(OrderUpdateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'id' => $validated['id'],
            'code' => $validated['code'],
            'author_id' => $validated['author_id']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        $order = Order::find($array['id']);
        return $order->update($array);
    }
}
