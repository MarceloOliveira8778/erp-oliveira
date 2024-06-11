<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'localizacao_id',
        'qtde_entrada',
        'valor_entrada',
        'subtotal_entrada',
        'data_entrada'
    ];

    public static function lista($data)
    {
        return self::where('data_entrada', $data)
            ->join('produtos', 'produtos.id', '=', 'entradas.produto_id')
            ->join('localizacoes', 'localizacoes.id', '=', 'entradas.localizacao_id')
            ->select('localizacoes.localizacao', 'produtos.produto', 'entradas.*')
            ->get();
    }

    public static function total($data)
    {
        return self::where('data_entrada', $data)
            ->sum('subtotal_entrada');
    }
}
