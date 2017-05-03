@extends('templates.template')


@section('content')

    <h1>Cadastro de Produto</h1>
    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger" >
            @foreach( $errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    @if( isset($produto) )
        <form action="{{route('produtos.update', $produto->id)}}" class="form" method="post">
          {!! method_field('put') !!}
    @else
        <form action="{{route('produtos.store')}}" class="form" method="post">
    @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome" class="form-control" value="{{$produto->nome or old('nome') }}" >
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="ativo" value="1" @if( isset($produto) && $produto->ativo == '1' ) checked @endif >
                Ativo
            </label>
        </div>
        <div class="form-group">
            <textarea name="descricao" cols="30" rows="10" placeholder="Descrição" class="form-control">{{$produto->descricao or old('descricao')}}</textarea>
        </div>
        <button class="btn btn-primary" >Salvar</button>
    </form>
@endsection
