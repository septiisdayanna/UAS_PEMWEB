<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'     => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id', // validasi id kategori
            'content'   => 'required',
            'image'     => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2050',
            'active'    => 'required',
            'status'    => 'required',

        ];
    }
}
