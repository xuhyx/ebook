<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'nickname' => 'required',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'telephone' => 'required|digits:11',
            'auth' => 'required',
            'picture' => 'required|image',
        ];
    }

}
