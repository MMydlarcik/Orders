<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
        $order = Order::find($this->id);
        return [
            'id' => 'required|integer|exists:order,id',
            'code' => 'required|string|unique:order,code,'.$order->getId().'id',
            'author_id' => 'required|integer'
        ];
    }
}
