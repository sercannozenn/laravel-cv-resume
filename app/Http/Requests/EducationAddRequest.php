<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "education_date" => "required|max:255",
            "university_name" => "required|max:255",
            "university_branch" => "required|max:255",
        ];
    }

    public function messages()
    {
        return [
            'education_date.required' => "Eğitim tarihi girilmesi zorunludur",
            'education_date.max' => "Eğitim tarihi alanı için en fazla 255 karakter girebilirsiniz.",
            'university_name.required' => "Üniversite adı girilmesi zorunludur.",
            'university_name.max' => "Üniversite adı alanı için en fazla 255 karakter girebilirsiniz.",
            'university_branch.required' => "Üniversite bölüm girilmesi zorunludur.",
            'university_branch.max' => "Üniversite bölüm alanı için en fazla 255 karakter girebilirsiniz.",
        ];
    }
}
