<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;

class HomeController extends Controller
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
            ["titulo" => "Home", "url" => ""]
        ]);

        $countArtigos = Artigo::count();

        return view('home', compact('listaMigalhas', 'countArtigos'));
    }
}
