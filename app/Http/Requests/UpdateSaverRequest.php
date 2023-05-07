<?php

namespace App\Http\Requests;

use App\Models\Saver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSaverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('saver_edit');
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
                'unique:savers,email,' . request()->route('saver')->id,
            ],
            'phone_1' => [
                'string',
                'required',
                'unique:savers,phone_1,' . request()->route('saver')->id,
            ],
            'phone_2' => [
                'string',
                'min:6',
                'nullable',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
