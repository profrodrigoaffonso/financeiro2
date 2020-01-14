@extends('layouts.admin')

@section('content')
    <h1>Formas de pagamento</h1>
    <p><a href="{{ route('forma_pagamentos.create') }}">Nova</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forma_pagamentos as $forma)
            <tr>
                <td>{{ $forma->nome }}</td>               
            @endforeach            
        </tbody>
    </table>
@endsection