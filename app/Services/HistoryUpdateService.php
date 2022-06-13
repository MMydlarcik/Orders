<?php

namespace App\Services;

use App\Http\Requests\HistoryUpdateRequest;
use App\Models\OrderHistory;

class HistoryUpdateService
{
    public function processRequest(HistoryUpdateRequest $request)
    {
        $validated = $request->validated();
        return $this->process($validated);
    }

    public function process($validated)
    {
        $itemId = $validated['item_id'];
        $action = $validated['action'];
        $historyAction = $validated['history_action'];
        $userId = $validated['user_id'];

        if ($action === 'Delete') {
            return OrderHistory::destroy($itemId);
        } elseif ($action === 'Edit') {
            $history = OrderHistory::find($itemId);
            return $history->update([
                'action' => $historyAction,
                'user_id' => $userId
            ]);
        }
    }
}
