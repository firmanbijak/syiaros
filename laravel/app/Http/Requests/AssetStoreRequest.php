<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStoreRequest extends FormRequest
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
            'playbook_id' => ['required', 'exists:playbooks,id'],
            'category_id' => ['nullable', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'asset_type' => ['required', 'string', 'in:hook,caption,story,poster,image,video,landing,faq,cta,follow_up'],
            'content' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'string', 'in:draft,published,archived'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'sort_order' => $this->input('sort_order') ?? 0,
        ]);
    }
}
