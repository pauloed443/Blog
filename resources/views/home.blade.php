@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        Painel para o Dashboard.
        <div class="row">
            <div class="col-md-4">
                <caixa qtd="{{$countArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
            </div>
            
            <div class="col-md-4">
                <caixa qtd="2693" titulo="Usuários" url="{{route('usuarios.index')}}" cor="green" icone="ion ion-person-stalker"></caixa>
            </div>
            
            <div class="col-md-4">
                <caixa qtd="71" titulo="Autores" url="#" cor="red" icone="ion ion-ios-people"></caixa>
            </div>
        </div>
    </painel>
</pagina>

@endsection
