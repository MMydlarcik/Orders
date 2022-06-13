<?php

namespace App\Services;

use App\Http\Requests\OrderItemCreateRequest;
use App\Models\OrderItem;

class OrderItemStoreService
{
    public function processRequest(OrderItemCreateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $orderId = $validated['order_id'];
        $code = $validated['code'];
        $qty = $validated['qty'];

        return OrderItem::create([
            'order_id' => $orderId,
            'code' => $code,
            'qty' => $qty
        ]);
    }
}
