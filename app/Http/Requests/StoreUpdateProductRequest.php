<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|min:3|max:10000',
            'foto' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Ops!!! Precisa informar pelo menos 3 caracteres',
            'nome.max' => 'Ops!!! Quantidade de caracteres acima do permitido',
            'descricao.min' => 'Ops!!! Precisa informar pelo menos 3 caracteres',
            'descricao.max' => 'Ops!!! Quantidade de caracteres acima do permitido',
            'foto.required' => 'Foto é obrigatória',
        ];
    }

}
