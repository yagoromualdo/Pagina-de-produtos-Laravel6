@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar novo produto</h1>

    @include('admin.alerts.alerts')

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome:"  value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <input type="text" name="price" placeholder="Preço:" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <input type="text" name="description" placeholder="Descrção:" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <input type="file" name="image" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
@endsection
