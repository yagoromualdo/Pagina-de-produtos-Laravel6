@extends('admin.layouts.app')

@section('title', "Editar o produto {$product->name}")

@section('content')
    <h1>Editar produto  {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
       @method('PUT')
       @include('admin.pages.products._partials.form')
    </form>
@endsection
