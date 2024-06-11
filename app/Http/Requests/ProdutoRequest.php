<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
    public function messages()
    {
        return [
            'produto.required' => 'O campo Nome do Produto não pode ficar vazio.',
            'preco.required' => 'O campo Preço não pode ficar vazio'
        ];
    }

    public function rules()
    {
        return [
            'produto' => 'required',
            'preco' => 'required'
        ];
    }
}
