<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UsuarioController::class, 'postUsuario'])->name('home');

Route::post('/usuario/cadastrado', [UsuarioController::class, 'createUsuario'])->name('novoUsuario');

Route::get('/usuarios', [UsuarioController::class, 'getUsuarios'])->name('usuarios');

Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'putUsuario'])->name('editar');

Route::put('/usuario/atualizado/{id}', [UsuarioController::class, 'updateUsuario'])->name('usuarioAtualizado');

Route::get('/usuarios/excluir/{id}', [UsuarioController::class, 'deleteUsuario'])->name('excluir');


