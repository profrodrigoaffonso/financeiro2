@extends('layouts.admin')

@section('content')
    <h1>Pagamentos</h1>
    <form method="POST" action="{{ route('pagamentos.filter') }}">
        @csrf
        <div class="row">
          <div class="col">
            <input type="date" name="de" value="{{ @$de ? $de : '' }}" class="form-control" placeholder="De">
          </div>
          <div class="col">
            <input type="date" name="ate" value="{{ @$ate ? $ate : '' }}" class="form-control" placeholder="Até">
          </div>
          <div class="col-1">
            <button type="submit" class="btn btn-primary">Exibir</button>
          </div>
          {{-- <div class="col-1">
            <button type="button" class="btn btn-primary">Limpar</button>
          </div> --}}
        </div>
    </form>
    @if(isset($pagamentos))
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Forma de Pagamento</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagamentos as $pagamento)
                <tr>
                    <td>{{ $pagamento->formaPagamento }}</td>               
                    <td>{{ number_format($pagamento->valor, 2, ',', '.') }}</td>               
                    <td>{{ date('d/m/Y H:s', strtotime($pagamento->data_hora)) }}</td>               
                @endforeach            
            </tbody>
        </table>
    @endif
    
@endsection