@extends('admin.layouts.app')

@section('title', 'Criando Produtos')

@section('content')
    
    <div class="container">
        <h1>Criando um Produto</h1>
        <form action="" method="post"></form>
        <div class="form-group">
          <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
          <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição">
          <input type="number" name="preco" id="preco" class="form-control" placeholder="Preço">
          <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
        </div>
    </div>
@endsection