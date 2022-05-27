<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.ar' => 'bail|required|string',
            'title.en' => 'bail|required|string',
            'client_id' => 'bail|required|integer',
            'area_id' => 'bail|required',
            'phone' => 'bail|required',
            'block' => 'bail|required|string|max:191',
            'avenue' => 'bail|required|string|max:191',
            'street' => 'bail|required|string|max:191',
            'building' => 'bail|required|string|max:191',
            'floor' => 'bail|required|string|max:191',
            'flat' => 'bail|required|string|max:191',
            'details' => 'nullable|string|max:191'
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
