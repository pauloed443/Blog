@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        <form action="{{ route('site') }}" method="get">
            <!-- Search form -->
            <div class="row mb-3 d-flex justify-content-end">
                <div class="col-md-10">
                <input class="form-control" type="search" name="search" placeholder="Search" value="{{ isset($search) ? $search : "" }}" aria-label="Search" style="border-bottom: 1px solid #4dd0e1; box-shadow: 0 1px 0 0 #4dd0e1;">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-outline-primary btn-block" value="Buscar">
                </div>
            </div>
        </form>
        <div class="card-deck">
            @foreach ($listaArtigos as $artigo)
                <card
                    titulo="{{ $artigo->titulo }}"
                    descricao="{{ str_limit($artigo->descricao, 100) }}"
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
