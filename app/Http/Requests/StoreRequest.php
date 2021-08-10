<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required'
        ];
    }

    public function messages() {
        return [
            'comment.required' => 'タスクが入力されていません。'
        ];
    }
}
