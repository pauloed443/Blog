@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    @if($errors->all())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oloco, meu!</strong>
            @foreach($errors->all() as $value)
                <li>{{ $value }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <painel titulo="Lista de Autores">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <tabela-lista
            v-bind:titulos="['#', 'Nome', 'E-mail']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            ordem="desc"
            ordemcol="0"
            criar="#criar"
            detalhe="autores/"
            editar="autores/"
            deletar="autores/"
            token="{{ csrf_token() }}"
            modal="t"
        ></tabela-lista>
        <div class="d-flex justify-content-center">
            {{ $listaModelo }}
        </div>
    </painel>

    <modal nome="adicionar" titulo="Adicionar Autores">
        <formulario id="formAdicionar" css="" action="{{ route('autores.store') }}" method="POST" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Edição de Autores">
        <formulario id="formEditar" css="" :action="'autores/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}" autocomplete="off">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" v-model="$store.state.item.name">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" v-model="$store.state.item.email" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>

    <modal nome="detalhe" titulo="Autor">
        <p>@{{$store.state.item.name}}</p>
        <p>@{{$store.state.item.email}}</p>
    </modal>
</pagina>

@endsection
