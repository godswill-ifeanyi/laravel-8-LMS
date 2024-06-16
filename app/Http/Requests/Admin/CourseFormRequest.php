<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
        $rules = [
            'category_id' => ['required'],
            'name' => ['required','string','max:200'],
            'slug' => ['nullable','string','max:200'],
            'short_description' => ['required'],
            'description' => ['required'],
            'image' => ['required','mimes:jpg,png,jpeg'],
            'top_course' => ['nullable'],
            'free_course' => ['nullable'],
            'meta_title' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keywords' => ['nullable'],
            'level' => ['required'],
            'yt_iframe' => ['nullable'],
            'status' => ['nullable'],
            'requirements' => ['required'],
            'outcome' => ['required'],
            'original_price' => ['required'],
            'discount_price' => ['nullable'],
        ];
        return $rules;
    }
}
