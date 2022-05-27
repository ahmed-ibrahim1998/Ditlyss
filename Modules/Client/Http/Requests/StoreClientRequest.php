<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                      => 'bail|required|string|max:191',
            'email'                     => 'bail|required|email|unique:users',
            'password'                  => 'bail|required|string|max:191|confirmed',
            'profile_photo_path'        => 'nullable|image|mimes:png,jpg,jpeg',
            'age'                       => 'bail|required|numeric',
            'height'                    => 'bail|required|numeric',
            'weight'                    => 'bail|required|numeric',
            'physical_activity'         => 'bail|required|string',
            'notes'                     => 'nullable|string|min:10',
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
