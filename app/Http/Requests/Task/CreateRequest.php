<?php

namespace App\Http\Requests\Task;

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
        if (auth()->user()->hasAnyRole(['admin', 'manager'])) {
            return [
                'employee_id'=>['required','exists:users,id'],
                'manager_id'=>['required','exists:users,id'],
                'text'=>['required','string','max:255'],
                'status'=>['required','string','max:30'],
            ];
        }elseif (auth()->user()->hasRole('employee')){
            return [
                'status'=>['required','string','max:30'],
            ];
        }else{
            return [];
        }

    }
    protected function prepareForValidation()
    {
        $this->request->add(['manager_id'=>auth()->id()]);
    }
}
