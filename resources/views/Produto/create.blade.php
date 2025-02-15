@extends("template")

@section("conteudo")

@php
$labels = Array(
    "titulo" => "Cadastrar", 
    "valor" => "", 
    "categoria" => 0,
    "unidade" => 0,
    "imagem" => "",
    "preco" => "",
    "ativo" => "",
    "ehproduto" => "",
    "ehinsumo" => "",
    "hiddenmethod" => ""
    );

if(isset($produto)){
    $labels["titulo"] = "Editar";
    $labels["valor"] = $produto->produto;
    $labels["categoria"] = $produto->categoria_id;
    $labels["unidade"] = $produto->unidade_id;
    $labels["imagem"] = $produto->imagem;
    $labels["preco"] = $produto->preco;
    $labels["ativo"] = $produto->ativo;
    $labels["ehproduto"] = $produto->eh_produto;
    $labels["ehinsumo"] = $produto->eh_insumo;
    $labels["hiddenmethod"] = '<input name="_method" type="hidden" value="PUT" />';
}
@endphp

<div class="col-9 central mb-3">
<span class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco"><i class="fas fa-plus-circle"></i> {{$labels["titulo"]}} produto</span>
<ul>
        @foreach($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
</ul>

<form action="{{isset($produto) ? route('produto.update', $produto->id) :route('produto.store')}}" method="POST" enctype="multipart/form-data"> 
@php 
    echo $labels["hiddenmethod"];
@endphp       
@csrf
<div class="rows p-4"> 
 
                        <div class="col-4">
                                <div class="py-1 px-2 mt-3 border text-center">
                                        <img src="{{isset($produto->imagem) ? asset('storage/upload/'.$produto->imagem) : asset('storage/upload/semproduto.png')}}" class="img-fluido opaco">
                                </div>
                        </div>
                        <div class="col-8 px-2">
                           <div class="rows">
                                <div class="col-12 mb-3">
                                        <label class="text-label">Titulo do produto</label>
                                        <input type="text" value="{{$labels["valor"]}}" name="produto" placeholder="Digite aqui..." class="form-campo">
                                </div>
                                <div class="col-6 mb-3">
                                        <label class="text-label">Categoria</label>
                                        <select class="form-campo" name="categoria_id">
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}" {{($labels["categoria"]==$categoria->id) ? "selected" : ""}}>{{$categoria->categoria}}</option> 
                                        @endforeach
                                        </select>
                                </div>
                                <div class="col-6 mb-3">
                                        <label class="text-label">Unidade</label>
                                        <select class="form-campo" name="unidade_id">
                                        @foreach($unidades as $unidade)
                                            <option value="{{$unidade->id}}" {{(($labels["unidade"]==$unidade->id) ? "selected" : "")}}>{{$unidade->unidade}}</option> 
                                        @endforeach
					</select>
                                </div>
                               
                                <div class="col-6 mb-3">
                                        <label class="text-label">Upload da imagem</label>
                                        <input type="file" name="arquivo" class="form-campo">
                                </div>
                                <div class="col-6 mb-3">
                                        <label class="text-label">Nome do arquivo</label>
                                        <input type="text" value="{{$labels["imagem"]}}" name="imagem" placeholder="Digite aqui..." class="form-campo">
                                </div>
                                <div class="col-3 mb-3">
                                        <label class="text-label">Preço</label>
                                        <input type="number" name="preco" value="{{$labels["preco"]}}" min="0" step="0.01" class="form-campo">
                                </div>
                                <div class="col-3 mb-3">
                                        <label class="text-label">Ativo</label>
                                        <select class="form-campo" name="ativo">
                                                <option value="S" {{($labels["ativo"]=="S" ? "selected" : "")}}>Sim</option>                                                 
                                                <option value="N" {{($labels["ativo"]=="N" ? "selected" : "")}}>Não</option> 
                                        </select>
                                </div>	
                                <div class="col-3 mb-3">
                                        <label class="text-label">é Insumo</label>
                                        <select class="form-campo" name="eh_insumo">
                                                <option value="S" {{($labels["ehinsumo"]=="S" ? "selected" : "")}}>Sim</option>                                                 
                                                <option value="N" {{($labels["ehinsumo"]=="N" ? "selected" : "")}}>Não</option> 
                                        </select>
                                </div>											

                                <div class="col-3 mb-3">
                                        <label class="text-label">é Produto</label>
                                        <select class="form-campo" name="eh_produto">
                                                <option value="S" {{($labels["ehproduto"]=="S" ? "selected" : "")}}>Sim</option>                                                 
                                                <option value="N" {{($labels["ehproduto"]=="N" ? "selected" : "")}}>Não</option> 
                                        </select>
                                </div>
                               <div class="col-12 mt-2">
                                    <input type="hidden" name="id_produto" value="">
                                    <input type="submit" value="Salvar alterações" class="btn btn-laranja btn-medio d-block m-auto">
                            </div>	
                        </div>
			
                           
                        </div>
        
</div>
</form>
</div>

@endsection