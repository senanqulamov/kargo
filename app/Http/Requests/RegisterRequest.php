<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:2|max:255|string',
            'email'=>'email|required',
            'password'=>'required|min:5|max:20',
            'password_confirmation' => 'same:password|sometimes',            
            'phone' => 'required|min:9|unique:users,phone',
            'sex' => 'required|integer',
            'store' => 'required',
            'referer' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'phone' =>  preg_replace('/\D+/', '', $this->phone),
        ]);

        $this->merge([
            'email' => Str::lower($this->email),
        ]);
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $key = Request::ajax() ? 'errors' : 'validation';
        $response = new Response([$key => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
