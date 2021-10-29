<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuseumPost extends FormRequest
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
            'address' => 'required', 
            'museum_url' => 'present|url', 
            'comment' => 'required', 
            'thefile' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => '施設名を入力してください。',
            'address.required' => '住所を入力してください。',
            'comment.required' => 'コメントを入力してください。',
            'thefile.required' => '画像をアップロードしてください。'
        ];
    }
}
