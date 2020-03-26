@extends('admin.layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')

<h1>Produto <small>{{ $product->nome }}</small><a href=" {{ route('products.index') }} " class="btn btn-light"><<</a></h1>


<ul>
    <li><strong>Nome: </strong> {{ $product->nome }} </li>
    <li><strong>Preço: </strong> {{ $product->preco }} </li>
    <li><strong>Descrição: </strong> {{ $product->descricao }} </li>
</ul>

<form action="{{ route('products.destroy', $product->id) }}" method="post">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger">Deletar o produto {{ $product->nome }}</button>


</form>

@endsection
