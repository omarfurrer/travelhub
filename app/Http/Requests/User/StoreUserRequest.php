<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Entities\Roles;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
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
        $roles = Roles::values();
        return [
            'name' => 'required|string|between:3,255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'numeric|unique:users,phone_number',
            'dob' => 'date',
            'role' => ['required', Rule::in($roles)]
        ];
    }

}
