<?php

namespace App\Services;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;

class OrderStoreService
{
    public function processRequest(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'code' => $validated['code'],
            'author_id' => $validated['author_id']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        return Order::create($array);
    }
}
