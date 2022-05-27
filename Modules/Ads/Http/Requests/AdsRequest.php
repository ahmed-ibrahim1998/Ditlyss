<?php

namespace Modules\Ads\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg,bmp,gif|max:2000',
            'video_url' => 'nullable|string',
            'url' => 'nullable|string',
            'position' => 'nullable|numeric',
            'location' => 'nullable|numeric',
            'priority' => 'nullable|numeric',
            'link_id' => 'nullable|numeric',
            'link_model' => 'nullable|string',
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
