<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'unique:users,email,' . $this->route()->parameter('user')?->id ?: $this->user()->id,
            'role' => 'nullable|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => $this->email . ' boshqa hodim uchun tanlangan, qayta kiriting',
        ];
    }
}
