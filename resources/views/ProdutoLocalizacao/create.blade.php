@extends("template")

@section("conteudo")

<div class="col-9 central mb-3">
    <div class="rows">
        <div class="col-12">
            <div class="caixa">
                <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                    <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de categoria </span>
                </div>

                <form name="busca" action="{{route('produtolocalizacao.store')}}" method="POST">
                    @csrf
                    <div class="px-2 pt-2">
                        <div class=" bg-padrao mt-2 p-2 radius-4">
                            <div class="rows">
                                <div class="col-4">
                                    <label class="text-label d-block text-branco">Produto </label>
                                    <select name="produto_id" class="form-campo">
                                        @foreach($produtos as $p)
                                        <option value="{{$p->id}}">{{$p->produto}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label class="text-label d-block text-branco">Localização </label>
                                    <select name="localizacao_id" class="form-campo">
                                        @foreach($localizacoes as $l)
                                        <option value="{{$l->id}}">{{$l->localizacao}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-2 mt-1 pt-1">
                                    <input type="submit" value="Inserir" class="btn btn-roxo text-uppercase">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12">
            <div class="px-2">
                <div class="tabela-responsiva pb-4">
                    <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th align="center">id</th>
                                <th align="left" width="30%">Produto</th>
                                <th align="left" width="30%">Localização</th>
                                <th align="left" width="10%">Estoque</th>
                                <th align="center">Editar</th>
                                <th align="center">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($lista as $l)
                            <tr>
                                <td align="center">{{$l->id}}</td>
                                <td align="left">{{$l->produto}}</td>
                                <td align="left">{{$l->localizacao}}</td>
                                <td align="left">{{$l->estoque}}</td>
                                <td align="center"><a href="" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a> </td>
                                <td align="center"><a href="" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a> </td>
                            </tr>
@endforeach


                        </tbody>
                    </table>

                </div>

            </div>


            <!--
                        <div class="caixa p-2">
                                <div class="msg msg-verde">
                                <p><b><i class="fas fa-check"></i> Mensagem de boas vindas</b> Parabéns seu produto foi inserido com sucesso</p>
                                </div>
                                <div class="msg msg-vermelho">
                                <p><b><i class="fas fa-times"></i> Mensagem de Erro</b> Houve um erro</p>
                                </div>
                                <div class="msg msg-amarelo">
                                <p><b><i class="fas fa-exclamation-triangle"></i> Mensagem de aviso</b> Tem um aviso pra você</p>
                                </div>
                        </div>
                     -->
        </div>

    </div>
</div>

@endsection