<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email',
             'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
        ];
    }

    public function messages(){
        return[
            'required'=>':attribute bắt buộc phải nhập',
            'max'=>'Chỉ tối đa :max ký tự',
            'min'=>'Tối thiểu :min ký tự',
            'regex'=>'Có ký tự hoa, có ký tự thường, có số, có ký tự đặc biệt'
        ];
    }
}
