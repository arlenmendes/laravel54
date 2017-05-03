@extends('templates.template')


@section('content')

        <h1>Listagem de Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary botao-adicionar"><span class="glyphicon glyphicon-plus"></span> Novo Produto</a>
        <table class = "table table-hover">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th class="acoes">Ações</th>
            </tr>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="acao editar"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="acao remover"><span class=" glyphicon glyphicon-eye-open"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>

@endsection
