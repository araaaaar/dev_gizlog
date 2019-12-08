<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchWordRequest extends FormRequest
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
            'search_word' => 'string|nullable',
        // 'tag_category_id' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'search_word.string' => '不正な入力です。',
            // 'tag_category_id.string' => '不正な入力です。',
        ];
    }

}
