<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'first_name'=>['required','string','max:20'],
            'last_name'=>['required','string','max:20'],
            'email'=>['required','email','unique:users,email'],
            'phone'=>['required','numeric','unique:users,phone'],
            'salary'=>['required','numeric'],
            'department_id'=>['required','exists:departments,id'],
            'role_id'=>['required','exists:roles,id'],
            'image'=>['mimes:jpg,bmp,png','file','max:1024'],
            'password'=>['required',
                'string',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                ],
        ];
    }
}
