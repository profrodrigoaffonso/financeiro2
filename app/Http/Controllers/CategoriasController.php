<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorias;


class CategoriasController extends Controller
{
    public function index(){

        $categorias = Categorias::get();

        return view('categorias.index', compact('categorias'));
        
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){

        $dados = $request->all();

        // dd($dados);

        Categorias::create($dados);

        return redirect(route('categorias.index'));

    }
}
