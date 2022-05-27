<?php

namespace Modules\Coupon\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.ar'=>'required',
            'name.en'=>'required',
            'code' => 'bail|required|string|max:191|unique:coupons',
            'usage_rule' => 'bail|required|string|in:all_customers,new_customers',
            'type' => 'bail|required|string|in:percentage,fixed',
            'free_delivery' => 'nullable',
            'amount' => 'bail|required|numeric',
            'count' => 'bail|required|numeric',
            'uses_per_customer' => 'bail|required|numeric',
            'description' => 'nullable',
            'min_value' => 'bail|required|numeric',
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
