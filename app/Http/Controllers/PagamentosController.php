<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorias;
use App\Models\FormaPagamentos;
use App\Models\Pagamentos;

class PagamentosController extends Controller
{
    public function inserir(){

        $categorias = Categorias::select('id', 'nome')->get();
        $formas = FormaPagamentos::select('id', 'nome')->get();
        // dd($categorias);

        return view('app.inserir', compact('categorias', 'formas'));

    }

    public function salvar(Request $request){
        
        $dados = $request->all();

        $dados['data_hora'] = "{$dados['data']} {$dados['hora']}";
        Pagamentos::create($dados);

        return redirect(route('pagamentos.inserir'));
    }
}
