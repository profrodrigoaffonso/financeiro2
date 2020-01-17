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

    public function index(){

        return view('pagamentos.index');

    }

    public function filter(Request $request){

        $dados = $request->all();

        $de = $dados['de'];
        $ate = $dados['ate'];

        $pagamentos = Pagamentos::select(

            'pagamentos.*',
            'forma_pagamentos.nome AS formaPagamento'
        )
            ->join('forma_pagamentos', 'forma_pagamento_id', 'forma_pagamentos.id')
            ->where('data_hora', '>=', $dados['de'] . ' OO:OO:OO')
            ->where('data_hora', '<=', $dados['ate'] . ' 23:59:59')
            ->orderBy('data_hora','ASC')->get();

        return view('pagamentos.index', compact('pagamentos', 'de', 'ate'));

    }

}
