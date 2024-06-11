<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use App\Models\Produtos;
use App\Models\ProdutoLocalizacao;
use Illuminate\Http\Request;

class ProdutoLocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        $localizacoes = Localizacao::all();
        $lista = ProdutoLocalizacao::lista();

        return view('ProdutoLocalizacao.Create', compact('produtos', 'localizacoes', 'lista'));
    }

    public function listaporproduto($id_produto)
    {
        $lista = ProdutoLocalizacao::where('produto_id', $id_produto)
        ->join('localizacoes', 'produto_localizacao.localizacao_id', '=', 'localizacoes.id')
        ->get();
        return json_encode($lista);//response()->json($lista);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        $tem = ProdutoLocalizacao::where('produto_id', $req['produto_id'])
            ->where('localizacao_id', $req['localizacao_id'])
            ->first();
        if (!$tem) {
            ProdutoLocalizacao::create($req);
        }
        return redirect('produtolocalizacao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
