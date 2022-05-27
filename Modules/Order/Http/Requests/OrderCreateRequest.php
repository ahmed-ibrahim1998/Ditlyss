<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{

    public function rules(): array
    {
            return [
                'area_id' => 'exists:areas,id',
                'customer_id' => 'required|exists:users,id',
                'driver_id' => ['required', 'exists:drivers,id'],
                'coupon' => ['required', 'exists:coupons,id'],
                'branch_id' => ['required', 'exists:branches,id'],
                'subtotal' => ['required'],
                'delivery_fees' => ['required'],
                'discount' => ['required'],
                'total' => ['required'],
                'status' => ['required'],
                'address' => 'required',
            ];
    }

    public function authorize()
    {
        return auth()->user()->isAn('admin');
    }
}
