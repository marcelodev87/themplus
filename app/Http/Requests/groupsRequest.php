<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class groupsRequest extends FormRequest
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
            // Address
            'zipcode' => 'nullable|min:8|max:9',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME é obrigatório',

            // Address
            'zipcode.size' => 'O campo CEP deve possuir entre 8 e 9 caracteres',
        ];
    }
}
