<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar rotas para sua aplicação. Essas rotas são
| carregadas pelo RouteServiceProvider e pertencem ao grupo "web".
|
*/

// Página inicial redireciona para criar um novo produto
Route::get('/', [ProdutoController::class, 'create'])->name('produtos.create');

// Rotas públicas (sem autenticação)
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
