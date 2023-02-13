<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequestCreate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:drivers',
            'cnh' => 'required|unique:drivers|digits:12',
            'password' => 'required|min:6|max:255',
            'carName' => 'required|max:255',
            'color' => 'required|max:50',
            'year' => 'required|digits:4',
            'plate' => 'required|unique:cars|max:7|min:7',
        ];
    }
}
