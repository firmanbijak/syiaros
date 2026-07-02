<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JourneyUpdateRequest extends FormRequest
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
        $journey = $this->route('journey');
        $journeyId = is_object($journey) ? $journey->id : $journey;

        return [
            'product_id' => ['required', 'exists:products,id'],
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('journeys', 'code')->ignore($journeyId),
            ],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('journeys', 'slug')->ignore($journeyId),
            ],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
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
