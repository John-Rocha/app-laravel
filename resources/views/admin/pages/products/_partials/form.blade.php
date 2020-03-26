@csrf
<div class="form-group">
    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="{{ $product->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $product->descricao ?? old('descricao') }}" placeholder="Descrição">
</div>
<div class="form-group">
    <input type="number" name="preco" id="preco" class="form-control" value="{{ $product->preco ?? old('preco') }}" placeholder="Preço">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="foto">
</div>
<button type="submit" class="btn btn-success">Cadastrar</button>
<a href=" {{ route('products.index') }} " class="btn btn-danger">Voltar</a>
