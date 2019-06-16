@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <painel titulo="Dashboard">
                Painel para o Dashboard.
                <div class="row">
                    <div class="col-md-4">
                        <caixa qtd="781" titulo="Artigos" url="#" cor="orange" icone="ion ion-pie-graph"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa qtd="2693" titulo="Usuários" url="#" cor="green" icone="ion ion-person-stalker"></caixa>
                    </div>
                    
                    <div class="col-md-4">
                        <caixa qtd="71" titulo="Autores" url="#" cor="red" icone="ion ion-ios-people"></caixa>
                    </div>
                </div>
            </painel>
        </div>
    </div>
</div>

@endsection
