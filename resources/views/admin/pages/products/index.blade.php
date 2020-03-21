@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @component('admin.components.cards')
        @slot('title')
            <h1>Titúlo Card</h1>
        @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    @include('admin.alerts.alerts', ['content' => 'Alerta de preço de produtos'])

    <hr>

    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif"> {{ $product }} </p>
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif"> {{ $product }} </p>
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

@push('styles')
    <style>
        .last {
            background: #CCC;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#999';
    </script>
@endpush
