<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            "nome.required" => "O campo nome não pode ficar vazio.",
            "cpf.required" => "O campo cpf não pode ficar vazio.",
            "email.required" => "O campo email não pode ficar vazio.",
            "senha.required" => "O campo senha não pode ficar vazio.",
            "cep.required" => "O campo cep não pode ficar vazio.",
            "logradouro.required" => "O campo logradouro não pode ficar vazio.",
            "numero.required" => "O campo numero não pode ficar vazio.",
            "uf.required" => "O campo uf não pode ficar vazio.",
            "cidade.required" => "O campo cidade não pode ficar vazio."
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nome" => "required",
            "cpf" => "required",
            "email" => "required",
            "senha" => "required",
            "cep" => "required",
            "logradouro" => "required",
            "numero" => "required",
            "uf" => "required",
            "cidade" => "required"
        ];
    }
}
