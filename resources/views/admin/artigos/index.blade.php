@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <tabela-lista 
        v-bind:titulos="['#', 'Título', 'Descrição']"
        v-bind:itens="[[1, 'PHP O.O', 'Cuso de PHP O.O'], [2, 'VUE JS', 'Cuso de VUE JS']]"
        criar="#criar"
        detalhe="#detalhe"
        editar="#editar"
        deletar="#deletar"
        token="5476876587"
        
        ></tabela-lista>
    </painel>
</pagina>

@endsection
