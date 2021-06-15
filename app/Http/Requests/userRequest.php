<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'email' => 'nullable|email',

            //Docs
            //'date_of_birth' => 'nullable|date',
            'document' => 'nullable|min:10',
            'document_secondary' => 'nullable|min:5|max:12',
            'genre' => 'nullable|in:male,female',

            // Address
            'zipcode' => 'nullable|min:8|max:9',





        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME é obrigatório',
            'email.required' => 'O campo EMAIL é obrigatório',
            'document.size' => 'O campo CPF deve possuir pelo menos 11 caracteres',
            'document_secondary.size' => 'O campo RG deve possuir entre 5 e 12 caracteres',
            'genre.in' => 'O campo GÊNERO deve ser masculino ou feminino',

            // Address
            'zipcode.size' => 'O campo CEP deve possuir entre 8 e 9 caracteres',
        ];
    }
}
