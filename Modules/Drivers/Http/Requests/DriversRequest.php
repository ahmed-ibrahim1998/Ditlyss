<?php

namespace Modules\Drivers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriversRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|string',
            'long' => 'required|string',
            'subscription_type' => 'required|string',
            'subscription_value' => 'required|numeric',
            'civil_id' => 'required',
            'images' => 'nullable',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,svg,bmp,gif|max:2000',
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
