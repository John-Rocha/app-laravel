@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif"> {{ $product }} </p>
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p class="@if ($loop->first) first @endif"> {{ $product }} </p>
    @empty
        <p>Não existem produtos cadastrados</p>
    @endforelse

    <hr>

    @if ($teste === 123)
        É igual!
    @else
        É diferente
    @endif

    @guest
        <p>Não autenticado</p>
    @endguest
@endsection

<style>
    .last {
        background: #CCC;
    }
    .first {
        background: red;
    }
</style>