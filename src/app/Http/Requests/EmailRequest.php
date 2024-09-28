<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email_subject'=> 'required|string|max:50',
            'email_message' => 'required|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'email_subject.required' => '店舗名は必須です。',
            'email_subject.max' => '店舗名は最大50文字までです。',
            'email_message.required' => 'メッセージは必須です。',
            'email_message.max' => '店舗説明は最大250文字までです。',
        ];
    }
}
