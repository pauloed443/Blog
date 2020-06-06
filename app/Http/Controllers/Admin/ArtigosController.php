<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Artigo;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo" => "Home", "url" => route('home')],
            ["titulo" => "Lista de Artigos", "url" => ""]
        ]);

        /*$listaArtigos = json_encode([
            ["id"=>1, "titulo"=>"PHP O.O", "descricao"=>"Cuso de PHP O.O", "dataPublicacao"=>"2020-07-04"],
            ["id"=>2, "titulo"=>"VUE JS", "descricao"=>"Cuso de VUE JS", "dataPublicacao"=>"2020-07-01"]
        ]);*/

        $listaArtigos = json_encode(Artigo::select('id','titulo','descricao','dataPublicacao')->get());

        return view('admin.artigos.index', compact('listaMigalhas', 'listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
          'titulo' => 'required',
          'descricao' => 'required',
          'conteudo' => 'required',
          'dataPublicacao' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        Artigo::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
