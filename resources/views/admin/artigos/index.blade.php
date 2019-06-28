@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Lista de Artigos">
        Painel para o Dashboard.
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Autor</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Título ..</td>
                    <td>Descrição ..</td>
                    <td>Autor ..</td>
                    <td>Data ..</td>
                    <td>
                        <a href="#">Editar</a> | 
                        <a href="#">Deletar</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Título ..</td>
                    <td>Descrição ..</td>
                    <td>Autor ..</td>
                    <td>Data ..</td>
                    <td>
                        <a href="#">Editar</a> | 
                        <a href="#">Deletar</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Título ..</td>
                    <td>Descrição ..</td>
                    <td>Autor ..</td>
                    <td>Data ..</td>
                    <td>
                        <a href="#">Editar</a> | 
                        <a href="#">Deletar</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Título ..</td>
                    <td>Descrição ..</td>
                    <td>Autor ..</td>
                    <td>Data ..</td>
                    <td>
                        <a href="#">Editar</a> | 
                        <a href="#">Deletar</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Título ..</td>
                    <td>Descrição ..</td>
                    <td>Autor ..</td>
                    <td>Data ..</td>
                    <td>
                        <a href="#">Editar</a> | 
                        <a href="#">Deletar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </painel>
</pagina>

@endsection
