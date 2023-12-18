<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'birthday' => ['nullable', 'date', 'before_or_equal:today'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'registration_date' => ['required', 'date']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['registration_date' => now()]);
    }
}
