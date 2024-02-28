<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
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

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});


Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
//Atualiza Update
Route::get('/atualizarProduto/{id}', [ProdutoController::class, 'atualizarProduto'])->name('atualizar.produto');
Route::put('/atualizarProduto/{id}', [ProdutoController::class, 'atualizarProduto'])->name('atualizar.produto');
Route::get('/produtos/show/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::delete('produtos/delete', [ProdutoController::class, 'delete'])->name('produtos.delete');



Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
//Atualiza Update
Route::get('/atualizarCliente/{id}', [ClienteController::class, 'atualizarCliente'])->name('atualizar.cliente');
Route::put('/atualizarCliente/{id}', [ClienteController::class, 'atualizarCliente'])->name('atualizar.cliente');
Route::get('/clientes/show/{id}', [ClienteController::class, 'show'])->name('clientes.show');
Route::delete('/delete', [ClienteController::class, 'delete'])->name('cliente.delete');


Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');
    //Cadastro Create
    Route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');
    Route::get('/enviaComprovantePorEmail/{id}', [VendaController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});
