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
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <tabela-lista
            v-bind:titulos="['#', 'Título', 'Descrição', 'Publicação']"
            v-bind:itens="{{json_encode($listaArtigos)}}"
            ordem="desc"
            ordemcol="0"
            criar="#criar"
            detalhe="artigos/"
            editar="artigos/"
            deletar="artigos/"
            token="{{ csrf_token() }}"
            modal="t"
        ></tabela-lista>
        <div class="d-flex justify-content-center">
            {{ $listaArtigos }}
        </div>
    </painel>

    <modal nome="adicionar" titulo="Titulo Modal Adicionar">
        <formulario id="formAdicionar" css="" action="{{ route('artigos.store') }}" method="POST" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" value="{{ old('titulo') }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="" value="{{ old('descricao') }}">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo">{{ old('conteudo') }}</textarea>
            </div>
            <div class="form-group">
                <label for="dataPublicacao">Data de Publicação</label>
                <input type="datetime-local" class="form-control" id="dataPublicacao" name="dataPublicacao" value="{{ old('dataPublicacao') }}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editação de artigo">
        <formulario id="formEditar" css="" :action="'artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="" v-model="$store.state.item.descricao">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo" v-model="$store.state.item.conteudo"></textarea>
            </div>
            <div class="form-group">
                <label for="dataPublicacao">Data de Publicação</label>
                <input type="datetime-local" class="form-control" id="dataPublicacao" name="dataPublicacao" v-model="$store.state.item.dataPublicacao">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
        <p>@{{$store.state.item.conteudo}}</p>
    </modal>
</pagina>

@endsection
