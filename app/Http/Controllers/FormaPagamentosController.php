<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormaPagamentos;


class FormaPagamentosController extends Controller
{
    public function index(){

        $forma_pagamentos = FormaPagamentos::get();

        return view('forma_pagamentos.index', compact('forma_pagamentos'));
        
    }

    public function create(){
        return view('forma_pagamentos.create');
    }

    public function store(Request $request){

        $dados = $request->all();

        // dd($dados);

        FormaPagamentos::create($dados);

        return redirect(route('forma_pagamentos.index'));

    }
}
