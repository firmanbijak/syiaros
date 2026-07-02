<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaybookStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'situation_id' => ['required', 'exists:situations,id'],
            'code' => ['required', 'string', 'max:20', 'unique:playbooks,code'],
            'title' => ['required', 'string', 'max:255'],
            'objective' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->has('status'),
            'sort_order' => $this->input('sort_order') ?? 0,
        ]);
    }
}
