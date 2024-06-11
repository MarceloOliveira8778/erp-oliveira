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
            url: base_url + 'entrada',
            type: "POST",
            data: {
                produto_id: id,
                qtde_entrada: qtde,
                valor_entrada: preco,
                localizacao_id: localizacao_id,
                subtotal_entrada: qtde * preco
            },
            success: function (data) {
                lista_entradas(data);
                limpar_entradas();
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

function lista_entradas(data) {
    html = '';
    total_entrada = 0.00;
    for (var i in data) {
        html += '<tr><td align="center">' + data[i].id +
            '</td><td align="center">' + data[i].data_entrada +
            '</td><td align="center">' + data[i].produto +
            '</td><td align="center">' + data[i].localizacao +
            '</td><td align="center">' + data[i].qtde_entrada +
            '</td><td align="center">' + data[i].valor_entrada +
            '</td><td align="center">' + data[i].subtotal_entrada +
            '</td></tr>';
        total_entrada += parseFloat(data[i].subtotal_entrada);
    }
    total_exibir = total_entrada.toFixed(2).replace('.', ',');
    html += '<tr><td align="right" colspan="7"><b>Total:</b> ' +
        '<span class="text-verde minimo-font" id="total_entrada">R$ ' + total_exibir +
        '</span></td></tr>';

    $('#lista_solicitacao').html(html);
}

function limpar_entradas() {
    $('#produto_id').val('');
    $('#produto').val('');
    $('#preco').val('');
    $('#qtde').val('');
    $('#produto').focus();
}