<?php

namespace App\Services;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;

class OrderStoreService
{
    public function processRequest(OrderCreateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $code = $validated['code'];
        $authorId = $validated['author_id'];

        return Order::create([
            'code' => $code,
            'author_id' => $authorId
        ]);
    }
}
