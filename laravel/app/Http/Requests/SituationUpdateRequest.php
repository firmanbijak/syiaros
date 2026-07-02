<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SituationUpdateRequest extends FormRequest
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
        $situation = $this->route('situation');
        $situationId = is_object($situation) ? $situation->id : $situation;

        return [
            'journey_id' => ['required', 'exists:journeys,id'],
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('situations', 'code')->ignore($situationId),
            ],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('situations', 'slug')->ignore($situationId),
            ],
            'description' => ['nullable', 'string'],
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
