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

        $categorias = Categorias::select('id', 'nome')->get();
        $de = date('Y-m').'-01';
        $ate = date('Y-m-t');

        return view('pagamentos.index', compact('categorias', 'de', 'ate'));

    }

    public function filter(Request $request){

        $dados = $request->all();

        // dd($dados);

        $de = $dados['de'];
        $ate = $dados['ate'];
        $categoria_id = $dados['categoria_id'];

        $whereCategoria = [];

        if($categoria_id)
            $whereCategoria[] = ['categoria_id', $categoria_id];

        $categorias = Categorias::select('id', 'nome')->get();

        $pagamentos = Pagamentos::select(

            'pagamentos.*',
            'forma_pagamentos.nome AS formaPagamento',
            'categorias.nome AS Categoria'
        )
            ->join('forma_pagamentos', 'forma_pagamento_id', '=', 'forma_pagamentos.id')
            ->join('categorias', 'categoria_id', '=', 'categorias.id')
            ->where('data_hora', '>=', $dados['de'] . ' OO:OO:OO')
            ->where('data_hora', '<=', $dados['ate'] . ' 23:59:59')
            ->where($whereCategoria)
            ->orderBy('data_hora','ASC')->get();

        return view('pagamentos.index', compact('pagamentos', 'de', 'ate', 'categorias', 'categoria_id'));

    }

}
