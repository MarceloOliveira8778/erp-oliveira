<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produtos extends Model
{
    use HasFactory;

    public static function atualizarEstoque($id_produto, $qtde)
    {
        $sql = "UPDATE produtos SET 
                        estoque_atual = estoque_atual + ($qtde) ,
                        estoque_real = estoque_real + ($qtde)
                WHERE
                        id = $id_produto ";
        DB::update($sql);
    }
}
