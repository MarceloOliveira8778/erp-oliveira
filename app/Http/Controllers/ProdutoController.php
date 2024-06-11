<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Categorias;
use App\Models\Produtos;
use App\Models\Unidades;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('Produto.Index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::all();
        $unidades = Unidades::all();
        return view('Produto.Create', compact('categorias','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        /*$request->validate([
            'produto' => 'required'
        ]);*/

        $nome_imagem = $request->input('imagem');

        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
            $nome_imagem = $request->arquivo->getClientOriginalName();
            $request->arquivo->storeAs('public/upload',$nome_imagem);
        }

        $produto = new Produtos();
        $produto->produto = $request->input('produto');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->unidade_id = $request->input('unidade_id');
        $produto->imagem = $nome_imagem;
        $produto->preco = $request->input('preco');
        $produto->ativo = $request->input('ativo');
        $produto->eh_produto = $request->input('eh_produto');
        $produto->eh_insumo = $request->input('eh_insumo');

        $produto->save();
        return redirect('/produto');
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
        $produto = Produtos::find($id);
        if(!$produto)
        {
            return redirect('/produto');
        }
        else
        {
            $categorias = Categorias::all();
            $unidades = Unidades::all();
            return view('produto.create', [
                'produto' => $produto,
                'categorias' => $categorias,
                'unidades' => $unidades
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produtos::find($id);
        if($produto){
            $nome_imagem = $request->input('imagem');

            if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
                $nome_imagem = $request->arquivo->getClientOriginalName();
                $request->arquivo->storeAs('public/upload',$nome_imagem);
            }

            $produto->produto = $request->input('produto');
            $produto->categoria_id = $request->input('categoria_id');
            $produto->unidade_id = $request->input('unidade_id');
            $produto->imagem = $nome_imagem;
            $produto->preco = $request->input('preco');
            $produto->ativo = $request->input('ativo');
            $produto->eh_produto = $request->input('eh_produto');
            $produto->eh_insumo = $request->input('eh_insumo');
            $produto->save();
        }
        return redirect('/produto');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function pesquisa()
    {
        return view('entrada.ajax');
    }*/
    public function pesquisar()
    {
        $q = $_GET["q"];
        $produtos = Produtos::where('produto', 'like', "%".$q."%")->get();
        return json_encode($produtos);//response()->json($produtos);
        
    }
}
