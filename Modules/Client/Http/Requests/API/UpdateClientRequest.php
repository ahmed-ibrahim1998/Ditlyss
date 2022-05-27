<?php

namespace Modules\Client\Http\Requests\API;

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
//            'name'                  => 'bail|required|string|max:191',
//            'email'                 => 'bail|required|email|unique:users,email,' . $request->client_id . ',id',
//            'password'              => 'nullable|string|max:191|confirmed',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'gender'=>'required|in:male,female',
//            'account_type'=>'required',
            'country_id'=>'required|numeric|min:2', // key of any country
            'whatsapp_number'=>'required|numeric'
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
