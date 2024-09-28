<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;




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
            'reserve_date' => ['required', 'date', 'after_or_equal:today'],
            'reserve_time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '予約日を選択してください。',
            'reserve_date.date' => '予約日を正しい形式で入力してください。',
            'reserve_date.after_or_equal' => '過去の日付は選択できません。',
            'reserve_time.required' => '予約時間を選択してください。',
            'reserve_time.date_format' => '予約時間を正しい形式で入力してください。',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $reserveDate = $this->input('reserve_date');
            $reserveTime = $this->input('reserve_time');
            $reserveDateTime = Carbon::parse("$reserveDate $reserveTime");

            if ($reserveDateTime->isPast()) {
                $validator->errors()->add('reserve_time', '過去の日時は選択できません。');
            }
        });
    }
}
