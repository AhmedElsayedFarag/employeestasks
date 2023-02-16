<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->route('user')->id],
            'phone' => ['required', 'numeric', 'unique:users,phone,' . $this->route('user')->id],
            'salary' => ['required', 'numeric'],
            'department_id'=>['required','exists:departments,id'],
            'image' => ['mimes:jpg,bmp,png', 'file', 'max:1024'],
            'password' => ['nullable',
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
