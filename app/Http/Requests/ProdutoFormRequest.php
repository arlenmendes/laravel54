<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:3|max:255'
        ];
    }

    public function messages() {
        return [
          'nome.required' => 'O nome é de preenchimento obrigatório!',
          'nome.min' => 'O nome deve ter no mínimo 3 caracteres!',
          'nome.max' => 'O nome deve ter no máximo 100 caracteres!',
          'descricao.required' => 'A descrição é de preenchimento obrigatório!',
          'descricao.min' => 'A descrição deve ter no mínimo 3 caracteres!',
          'descricao.max' => 'A descrição deve ter no máximo 100 caracteres!'
        ];
    }
}
