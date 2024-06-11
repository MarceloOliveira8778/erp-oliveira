$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});

$(function () {

    $('#btnInserirProduto').on('click', function () {
        var id = $('#produto_id').val();
        var qtde = $('#qtde').val();
        var preco = $('#preco').val();
        var localizacao_id = $('#localizacao_id').val();
        if (id == '') {
            alert('Escolha um produto!');
            return;
        }
        $.ajax({
            url: base_url + 'saida',
            type: "POST",
            data: {
                produto_id: id,
                qtde_saida: qtde,
                valor_saida: preco,
                localizacao_id: localizacao_id,
                subtotal_saida: qtde * preco
            },
            success: function (data) {
                lista_saidas(data);
                limpar_saidas();
            },
            error: function () {
                console.log('data');
            }
        });
    });

    $('#produto').on('keyup', function () {
        var q = $(this).val();
        if (q == '') {
            $('.listaProdutos').hide();
            return;
        }
        $.ajax({
            url: base_url + 'produto/pesquisa',
            type: "GET",
            data: { q: q },
            success: function (data) {
                dados = JSON.parse(data);

                $('#produto').after('<div class="listaProdutos"></div>');
                html = '';
                for (var i in dados) {
                    html += '<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)" ' +
                        'data-id="' + dados[i].id +
                        '" data-preco="' + dados[i].preco +
                        '" data-nome="' + dados[i].produto +
                        '">' + dados[i].produto + ' - R$ ' + dados[i].preco + '</a></div>';
                }
                $('.listaProdutos').html(html);
                $('.listaProdutos').show();
            },
            error: function () {
                console.log('data');
            }
        });
    });
});

function listaLocalizacao(id_produto) {
    $.ajax({
        url: base_url + 'produtolocalizacao/listaporproduto/' + id_produto,
        type: "GET",
        data: {},
        success: function (data) {
            dados = JSON.parse(data);

            html = '';
            for (var i in dados) {
                html += '<option value="' + dados[i].id +
                    '" >' + dados[i].localizacao + '</option>';
            }
            $('#localizacao_id').html(html);
        },
        error: function () {
            console.log('data');
        }
    });
}

function selecionarProduto(obj) {
    var id = $(obj).attr('data-id');
    var nome = $(obj).attr('data-nome');
    var preco = $(obj).attr('data-preco');
    $('.listaProdutos').hide();


    $('#produto_id').val(id);
    $('#produto').val(nome);
    $('#preco').val(preco);
    $('#qtde').val(1);
    $('#qtde').focus();

    listaLocalizacao(id);
}

function lista_saidas(data) {
    html = '';
    total_saida = 0.00;
    for (var i in data) {
        html += '<tr><td align="center">' + data[i].id +
            '</td><td align="center">' + data[i].data_saida +
            '</td><td align="center">' + data[i].produto +
            '</td><td align="center">' + data[i].localizacao +
            '</td><td align="center">' + data[i].qtde_saida +
            '</td><td align="center">' + data[i].valor_saida +
            '</td><td align="center">' + data[i].subtotal_saida +
            '</td></tr>';
        total_saida += parseFloat(data[i].subtotal_saida);
    }
    total_exibir = total_saida.toFixed(2).replace('.', ',');
    html += '<tr><td align="right" colspan="7"><b>Total:</b> ' +
        '<span class="text-verde minimo-font" id="total_saida">R$ ' + total_exibir +
        '</span></td></tr>';

    $('#lista_solicitacao').html(html);
}

function limpar_saidas() {
    $('#produto_id').val('');
    $('#produto').val('');
    $('#preco').val('');
    $('#qtde').val('');
    $('#produto').focus();
}