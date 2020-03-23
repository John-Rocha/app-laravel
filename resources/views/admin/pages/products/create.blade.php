@extends('admin.layouts.app')

@section('title', 'Criando Produtos')

@section('content')

    <div class="container">
        <h1>Criando um novo Produto</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
        <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                @csrf
                <input type="text" name="nome" id="nome" class="form-control mb-2" placeholder="Nome" value=" {{ old('nome') }} ">
                <input type="text" name="descricao" id="descricao" class="form-control mb-2" placeholder="Descrição" value=" {{ old('descricao') }} ">
                <input type="file" class="form-control mb-2" name="foto">
                <!--
                <input type="number" name="preco" id="preco" class="form-control" placeholder="Preço">
                -->
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href=" {{ route('products.index') }} " class="btn btn-danger">Voltar</a>
              </div>
        </form>
    </div>
@endsection
