<?php

namespace Modules\Slides\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlidesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'button_link' => 'bail|required_if:button_text,!=,null|string|max:191'
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
