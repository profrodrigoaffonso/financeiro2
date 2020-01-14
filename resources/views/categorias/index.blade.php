@extends('layouts.admin')

@section('content')
    <h1>Categorias</h1>
    <p><a href="{{ route('categorias.create') }}">Nova</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>               
            @endforeach            
        </tbody>
    </table>
@endsection