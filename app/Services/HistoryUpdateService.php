<?php

namespace App\Services;

use App\Http\Requests\HistoryUpdateRequest;
use App\Models\OrderHistory;

class HistoryUpdateService
{
    public function processRequest(HistoryUpdateRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'item_id' => $validated['item_id'],
            'action' => $validated['action'],
            'history_action' => $validated['history_action'],
            'user_id' => $validated['user_id']
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        if ($array['action'] === 'Delete') {
            return OrderHistory::destroy($array['item_id']);
        } elseif ($array['action'] === 'Edit') {
            $history = OrderHistory::find($array['item_id']);
            return $history->update([
                'action' => $array['history_action'],
                'user_id' => $array['user_id']
            ]);
        }
    }
}
