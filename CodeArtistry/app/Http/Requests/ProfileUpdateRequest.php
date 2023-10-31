<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required|regex:/^[A-Za-z\s]+$/',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'region' => ['string', 'max:255', Rule::in(['North-America', 'South-America', 'Europe', 'Oceania', 'Asia', 'Africa'])],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'This name is invalid',
            'name.max' => 'The name may not contain more than :max characters.',
            'email.unique' => 'This email is already taken.',
            'region.required' => 'The region is not specified.',
        ];
    }
}
