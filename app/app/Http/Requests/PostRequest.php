<?php

namespace App\Http\Requests;

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
            'title' => 'required|max:40',
            'published_at' => 'required|date_format:Y-m-d H:i',
            'is_public' => 'required|numeric',
            'body' => 'required',
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => '記事タイトル',
            'published_at' => '公開日',
            'is_public' => '公開状態',
            'body' => '記事本文',
        ];
    }
}
