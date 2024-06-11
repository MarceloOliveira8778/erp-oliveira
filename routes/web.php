<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoLocalizacaoController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\TipoMovimentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir'])->name("categoria.excluir");
Route::get('/unidade/excluir/{id}', [UnidadeController::class, 'excluir'])->name("unidade.excluir");
//em caso de erros, mudar de pesquisar para pesquisa e descomentar no ProdutoController
Route::get('/produto/pesquisa',[ProdutoController::class, 'pesquisar']);
Route::get('/produtolocalizacao/listaporproduto/{id}',[ProdutoLocalizacaoController::class, 'listaporproduto']);

Route::resource('/categoria',CategoriaController::class);
Route::resource('/unidade',UnidadeController::class);
Route::resource('/produto',ProdutoController::class);
Route::resource('/contato',ContatoController::class);
Route::resource('/tipomovimento',TipoMovimentoController::class);
Route::resource('/localizacao',LocalizacaoController::class);
Route::resource('/produtolocalizacao',ProdutoLocalizacaoController::class);
Route::resource('/entrada',EntradaController::class);
Route::resource('/saida',SaidaController::class);
Route::resource('/movimento',MovimentoController::class);
