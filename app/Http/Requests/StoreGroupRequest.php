<?php

namespace App\Http\Requests;

class StoreGroupRequest extends ApiRequest
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
            'name'                       => 'required|string|max:100',
            'invite_code'                => 'required|string|max:255|unique:groups,invite_code',
            'category_id'                => 'required|integer|exists:group_categories,id',
            'description'                => 'nullable|string',
            'cloudflare_turnstile_token' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'group_name_required',
            'name.string'   => 'group_name_must_be_string',
            'name.max'      => 'group_name_too_long',

            'invite_code.required' => 'invite_code_required',
            'invite_code.string'   => 'invite_code_must_be_string',
            'invite_code.unique'   => 'group_already_created',

            'category_id.required' => 'category_required',
            'category_id.integer'  => 'category_id_must_be_integer',
            'category_id.exists'   => 'category_invalid',

            'description.string' => 'description_must_be_string',

            'cloudflare_turnstile_token' => "cloudflare_turnstile_token_required"
        ];
    }
}