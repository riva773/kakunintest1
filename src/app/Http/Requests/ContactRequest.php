<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => ['required', 'email:strict,dns'],
            'address' => 'required',
            'category_id' => 'required',
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages(){
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名前を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        $phone1 = $this->input('phone1');
        $phone2 = $this->input('phone2');
        $phone3 = $this->input('phone3');

        if (empty($phone1) || empty($phone2) || empty($phone3)) {
            $validator->errors()->add('phone', '電話番号を入力してください');
        }

        $isInvalid = function ($val) {
            return !preg_match('/^\d{1,5}$/', $val ?? '');
        };

        if ($isInvalid($phone1) || $isInvalid($phone2) || $isInvalid($phone3)) {
            $validator->errors()->add('phone_format', '電話番号は5桁までの数字で入力してください');
        }
    });
}

}
