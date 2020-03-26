@extends('admin.layouts.app')

@section('title', 'Criando Produtos')

@section('content')

    <div class="container">
        <h1>Criando um novo Produto</h1>

        @include('admin.alerts.alerts')

        <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
            @include('admin.pages.products._partials.form')
        </form>
    </div>
@endsection
