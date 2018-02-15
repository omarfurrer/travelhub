<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Entities\Roles;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest {

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
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'phone_number' => ['numeric', 'nullable', Rule::unique('users')->ignore($this->user->id)],
            'dob' => 'date',
            'role' => ['required', Rule::in($roles)]
        ];
    }

}
