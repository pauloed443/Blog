@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <painel titulo="Dashboard">
                Painel para o Dashboard.
                <div class="row">
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 1" cortitulo="blue" cortitulobody="blue-body">
                            Painel para o 1º conteúdo.
                        </painel>
                    </div>
                    
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 2">
                            Painel para o 2º conteúdo.
                        </painel>
                    </div>
                    
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 3" cortitulo="orange" cortitulobody="orange-body">
                            Painel para o 3º conteúdo.
                        </painel>
                    </div>
                </div>
            </painel>
        </div>
    </div>
</div>

@endsection
