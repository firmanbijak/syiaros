<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlaybookUpdateRequest extends FormRequest
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
        $playbook = $this->route('playbook');
        $playbookId = is_object($playbook) ? $playbook->id : $playbook;

        return [
            'situation_id' => ['required', 'exists:situations,id'],
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('playbooks', 'code')->ignore($playbookId),
            ],
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
