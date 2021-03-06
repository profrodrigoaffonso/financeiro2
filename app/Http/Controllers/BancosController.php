<?php

namespace App\Http\Controllers;

use App\Models\Bancos;

use Illuminate\Http\Request;
use App\Http\Requests\BancosRequest;

class BancosController extends Controller
{
    public function index(){

        $bancos = Bancos::get();

        return view('bancos.index', compact('bancos'));
        
    }

    public function create(){
        return view('bancos.create');
    }

    public function store(BancosRequest $request){

        $dados = $request->all();

        Bancos::create($dados);

        return redirect(route('bancos.index'));

    }
}
