<?php

namespace App\Services;

use App\Http\Requests\HistoryCreateRequest;
use App\Models\OrderHistory;

class HistoryStoreService
{
    public function processRequest(HistoryCreateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $orderId = $validated['order_id'];
        $action = $validated['action'];
        $userId = $validated['user_id'];;

        return OrderHistory::create([
            'action' => $action,
            'user_id' => $userId,
            'order_id' => $orderId
        ]);
    }
}
