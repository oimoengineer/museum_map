<?php

namespace App\Http\Requests;

use App\Rules\CustomPasswordValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserEdit extends FormRequest
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
            'name' => 'required|max:255', 
            'email' => 'required|email|', 
            'new-password' => ['nullable', 'confirmed',new CustomPasswordValidation], 
            'new-password_confirmation' => ['nullable', new CustomPasswordValidation], 
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'new-password_confirmation.confirmed' => 'パスワードが一致していません。',
            'new-password.CustomPasswordValidation' => 'パスワードは半角英字（小文字）、半角英字（大文字）、半角数字を１文字以上含む8文字以上で入力してください。',
        ];

    }   
}
