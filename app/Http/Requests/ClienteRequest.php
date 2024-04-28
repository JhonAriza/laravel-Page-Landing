<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|max:255|min:3',
            'apellido' => 'required|max:255|min:3',
            'cedula' => 'required|numeric',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!strpos($value, '@')) {
                        $fail('El campo :attribute debe contener el símbolo "@".');
                    }
                },
            ],
            'celular' => 'required|numeric',
            'HabeasData' => 'required',

        ];

    }
    // public function messages(): array
    // {
    //     return [
    //         'nombre.required' => 'El campo es obligatorio',
    //         'apellido.required' => 'El campo es obligatorio',
    //         'cedula.required' => 'El campo es obligatorio',
    //         'email.required' => 'El campo es obligatorio',
    //         'HabeasData.required' => 'El campo es obligatorio',
    //         'celular.required' => 'El campo es obligatorio',
    //         'ganador.required' => 'El campo es obligatorio',
    //     ];
    // }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code' => 422,
            'message' => 'Validation errors',
            'errors' => $validator->errors(),
        ], 422));
    }
}
