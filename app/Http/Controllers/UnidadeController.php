<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Unidades::all();
        return view("Unidade.Index", ['unidades' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Unidade.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidade = new Unidades();
        $unidade->unidade = $request->input('unidade');
        $unidade->save();

        return redirect('/unidade')->with('msg', 'Unidade Adicionada com Sucesso!');
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
        $unidade = Unidades::find($id);
        if(!$unidade)
        {
            return redirect('/unidade');
        }
        else
        {
            return view('unidade.create', ['unidade' => $unidade]);
        }
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
        $unidade = Unidades::find($id);
        if($unidade){
            $unidade->unidade = $request->input('unidade');
            $unidade->save();
        }
        return redirect('/unidade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id){
        $unidade = Unidades::find($id);
        if($unidade){
            $unidade->delete();
        }
        return redirect('/unidade');
    }

    public function destroy($id)
    {
        //
    }
}
