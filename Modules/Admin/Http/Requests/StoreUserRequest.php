<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:191',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|string|max:191|confirmed',
            'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg',
            'role' => 'bail|required'
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
