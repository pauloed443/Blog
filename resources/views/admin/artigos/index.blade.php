@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <tabela-lista
            v-bind:titulos="['#', 'Título', 'Descrição', 'Publicação']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="desc"
            ordemcol="0"
            criar="#criar"
            detalhe="#detalhe"
            editar="#editar"
            deletar="#deletar"
            token="5476876587"
            modal="t"
        ></tabela-lista>
    </painel>

    <modal nome="adicionar" titulo="Titulo Modal Adicionar">
        <formulario id="formAdicionar" css="" action="{{ route('artigos.store') }}" method="POST" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
            </div>
            <div class="form-group">
                <label for="dataPublicacao">Data de Publicação</label>
                <input type="datetime-local" class="form-control" id="dataPublicacao" name="dataPublicacao">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Titulo Modal Editar">
        <formulario id="formEditar" css="" action="" method="put" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="">
            </div>
            <div class="form-group">
                <label for="descricao">Email address</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary">Salvar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        @{{$store.state.item.descricao}}
    </modal>
</pagina>

@endsection
