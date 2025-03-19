<?php

namespace App\Http\Requests\Backend;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPasswordCheckRule;

class StoreRoleUserRequest extends FormRequest
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
            'user_id' => ['required'],
            'role_id' => ['required']
        ];
    }
}
