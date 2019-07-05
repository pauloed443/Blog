@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        <tabela-lista 
        v-bind:titulos="['#', 'Título', 'Descrição']"
        v-bind:itens="[[1, 'PHP O.O', 'Cuso de PHP O.O'], [1, 'VUE JS', 'Cuso de VUE JS']]"
        
        ></tabela-lista>
    </painel>
</pagina>

@endsection
