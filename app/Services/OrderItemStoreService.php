<?php

namespace App\Services;

use App\Http\Requests\OrderItemCreateRequest;
use App\Models\OrderItem;

class OrderItemStoreService
{
    public function processRequest(OrderItemCreateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'order_id' => $validated['order_id'],
            'code' => $validated['code'],
            'qty' => $validated['qty']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        return OrderItem::create($array);
    }
}
