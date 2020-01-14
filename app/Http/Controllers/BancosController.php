<?php

namespace App\Http\Controllers;

use App\Models\Bancos;

use Illuminate\Http\Request;

class BancosController extends Controller
{
    public function index(){

        return view('bancos.index');
        
    }

    public function create(){
        return view('bancos.create');
    }

    public function store(Request $request){

        $dados = $request->all();

        Bancos::create($dados);

    }
}
