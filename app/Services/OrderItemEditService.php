<?php

namespace App\Services;

use App\Http\Requests\OrderItemUpdateRequest;
use App\Models\OrderItem;

class OrderItemEditService
{
    public function processRequest(OrderItemUpdateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $itemId = $validated['item_id'];
        $action = $validated['action'];
        $code = $validated['code'];
        $qty = $validated['qty'];

        if ($action == 'Delete') {
            return OrderItem::destroy($itemId);
        } elseif ($action == 'Edit') {
            $orderItem = OrderItem::find($itemId);
            return $orderItem->update([
                'code' => $code,
                'qty' => $qty
            ]);
        }
    }
}
