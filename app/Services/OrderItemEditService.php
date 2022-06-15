<?php

namespace App\Services;

use App\Http\Requests\OrderItemUpdateRequest;
use App\Models\OrderItem;

class OrderItemEditService
{
    public function processRequest(OrderItemUpdateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'item_id' => $validated['item_id'],
            'action' => $validated['action'],
            'code' => $validated['code'],
            'qty' => $validated['qty']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        if ($array['action'] == 'Delete') {
            return OrderItem::destroy($array['item_id']);
        } elseif ($array['action'] == 'Edit') {
            $orderItem = OrderItem::find($array['item_id']);
            return $orderItem->update($array);
        }
    }
}
