<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserAddressRequest extends FormRequest
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
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['validation' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
