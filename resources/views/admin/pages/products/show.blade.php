@extends('admin.layouts.app')

@section('title', "Detalhes do produto {$product->name}")

@section('content')

<h1>Produto {{ $product->name}}</h1>


<ul>
    <li><strong>Nome: </strong>{{ $product->name}}</li>
    <li><strong>Preço: </strong>{{ $product->price}}</li>
    <li><strong>Descrição: </strong>{{ $product->description }}</li>
    <hr>
    <li><a href="{{ route('products.index')}}">Voltar</li>

</ul>

<form action="{{ route('products.destroy', $product->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>

@endsection
