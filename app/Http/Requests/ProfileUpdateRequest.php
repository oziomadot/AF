<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'officalemail' => ['nullable','email', 'max:255', Rule::unique('users', 'officalemail')->ignore($this->user()->id)],
            'about' => ['nullable', 'string'],
            'designation_id' => ['required', Rule::exists('designations', 'id')],
            'profession1' => ['nullable', 'string'],
        ];
    }
}
