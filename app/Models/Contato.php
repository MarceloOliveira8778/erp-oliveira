<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        "eh_cliente",
        "eh_fornecedor",
        "eh_transportador",
        "nome",
        "nome_fantasia",
        "cpf",
        "data_cadastro",
        "ativo",
        "ddd",
        "fone",
        "celular",
        "email",
        "senha",
        "cep",
        "logradouro",
        "numero",
        "uf",
        "cidade",
        "complemento",
        "bairro",
        "rg"
    ];
}
