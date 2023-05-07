<?php

namespace App\Http\Requests;

use App\Models\Saver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSaverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('saver_create');
    }

    public function rules()
    {
        return [
            'firstname' => [
                'string',
                'required',
            ],
            'secondname' => [
                'string',
                'required',
            ],
            'thirdname' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:savers',
            ],
            'phone_1' => [
                'string',
                'required',
                'unique:savers',
            ],
            'phone_2' => [
                'string',
                'min:6',
                'nullable',
            ],
            'password' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'shares' => [
                'string',
                'nullable',
            ],
        ];
    }
}
