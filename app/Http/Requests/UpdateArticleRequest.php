<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
             "title" => "required|min:10|max:255|unique:articles,title,".$this->route('article')->id,
            // "title" => "required|min:10|max:255",

            "description" => "required|min:100",
            "category" => "required|exists:categories,id",
            "featured_image" => "nullable|mimes:jpeg,png|file|max:10240"
        ];
    }
}
