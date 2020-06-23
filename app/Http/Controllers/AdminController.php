<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo" => "Admin", "url" => ""]
        ]);

        $countArtigos = Artigo::count();
        $countUsuarios = User::count();
        $countAutores = User::where('autor', 'S')->count();
        $countAdministradores = User::where('admin', 'S')->count();

        return view('admin', compact('listaMigalhas', 'countArtigos', 'countUsuarios', 'countAutores', 'countAdministradores'));
    }
}
