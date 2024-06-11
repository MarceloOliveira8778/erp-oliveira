<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdutoLocalizacao extends Model
{
    use HasFactory;

    protected $table = 'produto_localizacao';
    protected $fillable = [
        'produto_id',
        'localizacao_id'
    ];

    public static function lista()
    {
        $lista = DB::table('produto_localizacao')
            ->join('produtos', 'produto_localizacao.produto_id', '=', 'produtos.id')
            ->join('localizacoes', 'produto_localizacao.localizacao_id', '=', 'localizacoes.id')
            ->select('produtos.produto', 'localizacoes.localizacao', 'produto_localizacao.*')
            ->get();

        return $lista;
    }

    public static function atualizarEstoque($id_produto, $id_localizacao, $qtde)
    {
        $sql = "UPDATE produto_localizacao SET 
                        estoque = estoque + ($qtde) 
                WHERE
                        produto_id = $id_produto AND localizacao_id = $id_localizacao ";
        DB::update($sql);
    }
}
