<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComunityStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => ['required', 'unique:communities'],
            'name' => ['required', Rule::unique('communities')->ignore($this->community)],
            // 'slug' => ['required', 'unique:communities'],
            // 'slug' => ['required'],
            'description' => ['required', 'min:5'],
        ];
    }
}
