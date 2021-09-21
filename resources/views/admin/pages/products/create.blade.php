@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar novo produto</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrção:">
        <button type="submit">Enviar</button>
    </form>
@endsection
