<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'unique:users,email,' . $this->user()->id,
            //'password' => 'confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => $this->email . ' boshqa hodim uchun tanlangan, qayta kiriting',
        ];
    }
}
