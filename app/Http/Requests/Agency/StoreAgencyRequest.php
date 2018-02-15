<?php

namespace App\Http\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgencyRequest extends FormRequest {

    /**
     * Determine if the agency is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'logo' => 'nullable|image|dimensions:width=150,height=150',
            'description' => 'nullable|string',
            'doe' => 'nullable|date',
            'address' => 'nullable|string',
            'contact_phone' => 'nullable|string',
            'website_url' => 'nullable|url',
            'fb_url' => 'nullable|url',
            'gmaps_url' => 'nullable|url'
        ];
    }

}
