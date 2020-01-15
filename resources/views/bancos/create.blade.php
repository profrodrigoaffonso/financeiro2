@extends('layouts.admin')

@section('content')
<form action="{{ route('bancos.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Código</label>
      <input type="text" class="form-control" id="codigo" name="codigo">
      @if($errors->has('codigo'))
      Digite o código
      @endif
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome">
      @if($errors->has('nome'))
      Digite o nome
      @endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Agência</label>
        <input type="text" class="form-control" id="agencia" name="agencia">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Conta</label>
        <input type="text" class="form-control" id="conta" name="conta">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" value="s" id="correntista" name="correntista">
      <label class="form-check-label" for="correntista">Correntista</label>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
