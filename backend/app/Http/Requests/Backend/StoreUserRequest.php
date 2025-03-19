<?php

namespace App\Http\Requests\Backend;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User())->getTable())->ignore($this->id)],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ];
    }
}
