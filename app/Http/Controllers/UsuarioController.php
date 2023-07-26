<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function postUsuario() {
        $estados = Estado::all();
        $cidades = Cidade::all();

        return view('home', [
            'estados' => $estados,
            'cidades' => $cidades
        ]);
    }

    public function createUsuario(Request $request) {
        $novoUsuario = Usuario::create([
            'nome' => $request->razao_social,
            'fantasia' => $request->nome_fantasia,
            'cnpj' => $request->cnpj,
            'celular' => $request->celular,
            'id_cidade' => $request->cidades,
        ]);

        return view('cadastrado', [
            'novoUsuario' => $novoUsuario,
        ]); 
    }

    public function getUsuarios() {
        $usuarios = Usuario::all();

        return view('usuario', [
            'usuarios' => $usuarios,
        ]);
    }

    public function putUsuario($id) {
        $usuario = Usuario::findOrFail($id);
        $estados = Estado::all();
        $cidades = Cidade::all();

        return view('editar', [
            'usuario' => $usuario,
            'estados' => $estados,
            'cidades' => $cidades,
        ]);
    }

    public function updateUsuario(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->nome = $request->razao_social;
        $usuario->fantasia = $request->nome_fantasia;
        $usuario->cnpj = $request->cnpj;
        $usuario->celular = $request->celular;
        $usuario->id_cidade = $request->cidades;
        $usuario->save();

        return view('atualizado', [
            'usuario' => $usuario,
        ]);
    }

    public function deleteUsuario($id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return view('excluir');
    }
}
