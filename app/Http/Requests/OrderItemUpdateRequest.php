<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Illuminate\Foundation\Http\FormRequest;

class OrderItemUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $orderItem = OrderItem::find($this->id);
        return [
            'order_id' => 'required',
            'item_id' => 'required',
            'code' => 'required|string',
            'qty' => 'required|numeric',
            'action' => 'required|string',
        ];
    }
}
