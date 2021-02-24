<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class LoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            //
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:20']
        ];
    }
    public function messages()
    {
        return [

            'email.required' => 'O Campo usuário é de preenchimento Obrigatório',
            'email.email' => 'O email deve ser válido',
            'password.required' => 'O Campo senha é de preenchimento Obrigatório',
            'password.min' => 'A senha deve ter no minimo :min caracteres',
            'password.max' => 'A senha deve ter no máximo :max caracteres',
        ];
    }
}
