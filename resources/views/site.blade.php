@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        <div class="card-deck">
            <card
                titulo="Card title"
                descricao="Some quick example text to build on the card title and make up the bulk of the card's content."
                data="21/08/2020"
                autor="Paulo"
                link="#"
                textLink="Veja mais"
                imagemLink="https://z9t4u9f6.stackpathcdn.com/wp-content/uploads/2018/09/gradient-card.jpg"
            ></card>
            <card></card>
            <card></card>
        </div>
    </painel>
</pagina>

@endsection
