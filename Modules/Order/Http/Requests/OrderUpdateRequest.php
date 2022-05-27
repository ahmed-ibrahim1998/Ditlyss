<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'area_id' => 'exists:areas,id',
            'customer_id' => 'exists:users,id',
            'driver_id' => ['exists:drivers,id'],
            'coupon' => ['exists:coupons,id'],
            'branch_id' => ['exists:branches,id'],
            'subtotal' => ['required'],
            'delivery_fees' => ['required'],
            'discount' => ['required'],
            'total' => ['required'],
            'status' => ['required'],
        ];
    }

    public function authorize()
    {
        return auth()->user()->isAn('admin');
    }
}
