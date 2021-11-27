<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'string',
            'subtitle' => 'string',
            'description' => 'max:5000',
            'published'=>'boolean',
            'category_id' =>'required',
            'author_id'=>'required',
            'resume'=>'string',
            'keywords'=>'string',
        ];
    }
}
