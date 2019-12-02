<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchMonthRequest extends FormRequest
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
            'search-month' => ['date', 'before_or_equal:today']
        ];
    }

    public function messages()
    {
        return [
            'search-month.date'            => '____年__月の形式で入力してください。',
            'search-month.before_or_equal' => '今日以前の日付を入力してください。',
        ];
    }
}
