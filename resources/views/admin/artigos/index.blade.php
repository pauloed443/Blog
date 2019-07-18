@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <modallink 
            tipo="button" 
            nome="meuModalTeste" 
            titulo="Botão Show Modal Teste" 
            css=""
        ></modallink>
        <tabela-lista
            v-bind:titulos="['#', 'Título', 'Descrição']"
            v-bind:itens="[[1, 'PHP O.O', 'Cuso de PHP O.O'], [2, 'VUE JS', 'Cuso de VUE JS']]"
            ordem="desc"
            ordemcol="0"
            criar="#criar"
            detalhe="#detalhe"
            editar="#editar"
            deletar="#deletar"
            token="5476876587"
        ></tabela-lista>
    </painel>
    <modal nome="meuModalTeste" titulo="Titulo Modal Teste">
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
</pagina>

@endsection
