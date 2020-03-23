@extends('admin.layouts.app')

@section('title', 'Editar Produtos')

@section('content')

    <div class="container">
        <h1>Editando Produto {{ $id }} </h1>
        <form action=" {{ route('products.update', $id) }} " method="post">
            @method('PUT')
            <div class="form-group">
                @csrf
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição">
                <!--
                <input type="number" name="preco" id="preco" class="form-control" placeholder="Preço">
                -->
                <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
              </div>
        </form>
    </div>
@endsection
