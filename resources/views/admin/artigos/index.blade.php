@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModalTeste">
            Launch demo modal
        </button>
        <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição']"
        v-bind:itens="[[1, 'PHP O.O', 'Cuso de PHP O.O'], [2, 'VUE JS', 'Cuso de VUE JS']]"
        ordem="desc"
        ordemcol="0"
        criar="#criar"
        detalhe="#detalhe"
        editar="#editar"
        deletar="#deletar"
        token="5476876587"></tabela-lista>
    </painel>
    <modal nome="meuModalTeste" titulo="Titulo Modal Teste"></modal>
</pagina>

@endsection
