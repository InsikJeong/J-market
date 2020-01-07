<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
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
             // 유효성체크 필드 설정 룰 저장
                'name'=> ['required'],
                'price'=> ['required'],
                'comments'=> ['required']    ,
                'files'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'required' => '필수 입력 항목입니다.',
            'min' => ':min 이상을 입력해주세요.',
            'max' => ':max 이하를 입력해주세요.',
        ];
    }

}
