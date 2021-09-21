@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1> Exibindo os produtos </h1>

    @include('admin.alerts.alerts')

    <hr>

    @if (isset($products))
        @foreach ( $products as $product)
            <p class="@if ($loop->last) last @endif">{{ $product }}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p>{{ $product }}</p>
    @empty
        <p> Não existem cadastros.</p>
    @endforelse
    <hr>

    {{ $teste }}

    @if ($teste === 123)
        É igual a 123
    @elseif($teste === 123)
        Não é igual a 123
    @else
        É diferente
    @endif


    @if ($teste === 321)
        </br></br>{{ $teste }} É igual a 321
    @elseif($teste === 321)
        </br></br>{{ $teste }} Não igual a 321
    @else
        </br></br> {{ $teste }} É diferente de 321
    @endif


    @isset($Variavelquenaoexiste)
        {{ $Variavelquenaoexiste }}
    @endisset


    @empty($teste2)
        <p> Vazio </p>
    @endempty


    @auth
        <p>Autenticado</p>
    @else
        <p>Não utenticado</p>
    @endauth

    @guest
        <p>Não autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
        Igual a 1
        @break
        @case(2)
        Igual a 2
        @break
        @case(123)
        Igual a 123
        @break
        @default
        Defalt
    @endswitch

@endsection


<style>
    .last{
        font-size: 20px;
        color: #ffffff;
        background: rgb(3, 1, 95);
        }
</style>
