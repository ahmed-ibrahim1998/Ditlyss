<?php

namespace Modules\Coupon\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'code'                  => 'bail|required|string|max:191|unique:coupons,code,'.$request->coupon_id. ',id',
            'usage_rule'            => 'bail|required|string|in:all_customers,new_customers',
            'type'                  => 'bail|required|string|in:percentage,fixed',
            'free_delivery'         => 'nullable',
            'amount'                => 'bail|required|numeric',
            'start_date'            => 'bail|required|date',
            'expiration_date'       => 'bail|required|date|after:start_date',
            'count'                 => 'bail|required|numeric',
            'uses_per_customer'     => 'bail|required|numeric',
            'decription'            => 'nullable',
            'min_value'             => 'bail|required|numeric',
            'languages'             => 'bail|required|array|min:2',
            'languages.*'           => 'bail|required|distinct'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
