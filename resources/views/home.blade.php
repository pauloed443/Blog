@extends('layouts.app')

@section('content')
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <painel titulo="Dashboard">
                    Painel para o Dashboard.
                    <div class="row">
                        <div class="col-md-4">
                            <painel titulo="Conteúdo 1">
                                Painel para o 1º conteúdo.
                            </painel>
                        </div>
                        
                        <div class="col-md-4">
                            <painel titulo="Conteúdo 2">
                                Painel para o 2º conteúdo.
                            </painel>
                        </div>
                        
                        <div class="col-md-4">
                            <painel titulo="Conteúdo 3">
                                Painel para o 3º conteúdo.
                            </painel>
                        </div>
                    </div>
                </painel>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

@endsection
