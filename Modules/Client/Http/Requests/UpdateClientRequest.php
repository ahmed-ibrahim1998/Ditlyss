<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'                  => 'bail|required|string|max:191',
            'email'                 => 'bail|required|email|unique:users,email,' . $request->client_id . ',id',
            'password'              => 'nullable|string|max:191|confirmed',
            'profile_photo_path'    => 'nullable|image|mimes:png,jpg,jpeg'
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
