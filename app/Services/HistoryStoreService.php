<?php

namespace App\Services;

use App\Http\Requests\HistoryCreateRequest;
use App\Models\OrderHistory;

class HistoryStoreService
{
    public function processRequest(HistoryCreateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'order_id' => $validated['order_id'],
            'action' => $validated['action'],
            'user_id' => $validated['user_id']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        return OrderHistory::create($array);
    }
}
