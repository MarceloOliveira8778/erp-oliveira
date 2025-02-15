@extends("template")

@section("conteudo")

@php
$labels = Array(
    "titulo" => "Cadastrar", 
    "valor" => "", 
    "botao" => "Inserir",
    "hiddenmethod" => ""
    );

if(isset($categoria)){
    $labels["titulo"] = "Editar";
    $labels["valor"] = $categoria->categoria;
    $labels["botao"] = "Alterar";
    $labels["hiddenmethod"] = '<input name="_method" type="hidden" value="PUT" />';
}
@endphp

<div class="col-9 central mb-3">
<span class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco"><i class="fas fa-plus-circle"></i> {{$labels["titulo"]}} categoria</span>

<form action="{{isset($categoria) ? route('categoria.update', $categoria->id) : route('categoria.store')}}" method="Post">
@php 
    echo $labels["hiddenmethod"];
@endphp
@csrf 
            <div class="col-6 d-block m-auto rows px-5 py-5">
                <div class="col-12 mb-3">
                    <label class="text-label">Nome</label>	
                    <input type="text" required name="categoria" value="{{$labels["valor"]}}" class="form-campo" placeholder="Digite o nome da categoria">
                </div>                                   
                <div class="col-12 mt-3 mb-5">
                    <input type="hidden" name="id_categoria" value="">
                    <input type="submit" name="" value="{{$labels["botao"]}} categoria" class="btn btn-laranja d-block m-auto">
                </div>
            </div>
        </form>
</div>

@endsection