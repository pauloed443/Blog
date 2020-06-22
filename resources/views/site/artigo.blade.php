@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel>
        <h2 class="font-weight-bold">{{ $artigo->titulo }}</h2>
        <p><small class="text-muted">{{ $artigo->user->name }} • {{ date_format(new DateTime($artigo->dataPublicacao), "d/m/Y \à\s h:i") }}</small></p>
        <p class="text-break">{{ $artigo->conteudo }}</p>
    </painel>
</pagina>

@endsection
