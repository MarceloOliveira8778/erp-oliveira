<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view("Contato.index", compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Contato.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoRequest $request)
    {
        Contato::create($request->all());
        return redirect()->route('contato.index');
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
        $contato = Contato::find($id);
        if(!$contato)
        {
            return redirect()->route('contato.index');
        }
        return view('contato.create', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContatoRequest $request, $id)
    {
        $contato = Contato::find($id);
        if(!$contato)
        {
            return redirect()->route('contato.index');
        }

        $update = $contato->update($request->all());
        if($update) {
            return redirect()->route('contato.index')->with('success', 'Atualizado com sucesso.');
        }
        else {
            return redirect()->back()->with('erro', 'não foi possível atualizar');
        }
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
