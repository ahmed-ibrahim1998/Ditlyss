<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title.ar' => 'required|string',
            'title.en' => 'required|string',
            'area_id' => 'required|nullable',
            'phone' => 'required|nullable',
            'block' => 'required|string|max:191|nullable',
            'avenue' => 'required|string|max:191|nullable',
            'street' => 'required|string|max:191|nullable',
            'building' => 'required|string|max:191|nullable',
            'floor' => 'required|string|max:191|nullable',
            'flat' => 'required|string|max:191|nullable',
            'details' => 'nullable|string|max:191|nullable'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
