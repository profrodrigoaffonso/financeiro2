@extends('layouts.app')

@section('content')
<h1 class="text-center">Inserir</h1>
<form action="{{ route('pagamentos.salvar') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Categoria</label>
        <select class="form-control" id="categoria_id" name="categoria_id" required>
            <option value="">Selecione</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>       
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Forma de pagamento</label>
        <select class="form-control" id="forma_pagamento_id" name="forma_pagamento_id" required>
            <option value="">Selecione</option>
            @foreach($formas as $forma)
                <option value="{{ $forma->id }}">{{ $forma->nome }}</option>
            @endforeach
        </select>       
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor" required>     
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="exampleInputPassword1">Data</label>
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="data" name="data" required>
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Hora</label>
                <input type="time" value="{{ date('H:i') }}" class="form-control" id="hora" name="hora" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Obs</label>
        <textarea class="form-control" id="obs" name="obs"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection