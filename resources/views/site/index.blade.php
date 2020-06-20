@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        <div class="card-deck">
            @foreach ($listaArtigos as $artigo)
                <card
                    titulo="{{ $artigo->titulo }}"
                    descricao="{{ $artigo->descricao }}"
                    data="{{ $artigo->dataPublicacao }}"
                    autor="{{ $artigo->autor }}"
                    link="{{ route('site.artigo', [$artigo->id, str_slug($artigo->titulo)]) }}"
                    linktexto="Veja mais"
                    imagemlink="https://z9t4u9f6.stackpathcdn.com/wp-content/uploads/2018/09/gradient-card.jpg"
                ></card>
            @endforeach
        </div>
    </painel>
</pagina>

@endsection
