<?php

namespace App\Services;

use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;

class OrderUpdateService
{
    public function processRequest(OrderUpdateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $id = $validated['id'];
        $code = $validated['code'];
        $authorId = $validated['author_id'];
        $order = Order::find($id);
        return $order->update([
            'code' => $code,
            'author_id' => $authorId
        ]);
    }
}
