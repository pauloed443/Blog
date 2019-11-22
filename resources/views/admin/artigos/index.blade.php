@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        
        <tabela-lista
            v-bind:titulos="['#', 'Título', 'Descrição']"
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
        <formulario css="" action="" method="put" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
            </div>
            <div class="form-group">
                <label for="descricao">Email address</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="">
            </div>
            <button class="btn btn-primary">Adicionar</button>
        </formulario>
    </modal>
    <modal nome="editar" titulo="Titulo Modal Editar">
        <formulario css="" action="" method="put" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="">
            </div>
            <div class="form-group">
                <label for="descricao">Email address</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="">
            </div>
            <button class="btn btn-primary">Salvar</button>
        </formulario>
    </modal>
    <modal nome="detalhe" titulo="Detalhes do Artigo">
        <painel v-bind:titulo="$store.state.item.titulo">
            @{{$store.state.item.descricao}}
        </painel>
    </modal>
</pagina>

@endsection
