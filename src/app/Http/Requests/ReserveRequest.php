<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ReserveRequest extends FormRequest
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
            'reserve_date' => ['required', 'date'],
            'reserve_time' => ['required', 'time'],
            'reserve_num' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '予約日を入力してください',
            'reserve_time.required' => '予約時間を入力してください',
            'reserve_num.required' => '予約人数を入力してください',
            'reserve_date.before'  =>  '過去日付は入力できません',
            'reserve_time.before'  =>  '過去時間は入力できません',

            'first_name.string' => '姓を文字列で入力してください',
            'first_name.max' => '姓を255文字以下で入力してください',
            'last_name.required' => '名を入力してください',
            'last_name.string' => '名を文字列で入力してください',
            'last_name.max' => '名を255文字以下で入力してください',
            'gender.required' => '性別を入力してください',
            'gender.string' => '性別を文字列で入力してください',
            'gender.max' => '性別を255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tell.required' => '電話番号を入力してください',
            'tell.numeric' => '電話番号を数値で入力してください',
            'tell.digits_between' => '電話番号を10桁から11桁の間で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'category_ID.required' => 'お問い合わせお問い合わせの種類を入力してください',
            'category_ID.string' => '内容種別を文字列で入力してください',
            'category_ID.max' => '内容種別を255文字以下で入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせ内容を文字列で入力してください',
            'detail.max' => 'お問い合わせ内容を120文字以下で入力してください',
        ];
    }

}
