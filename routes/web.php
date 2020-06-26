<?php
use App\Artigo;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    if (isset($request->search) && $request->search != "") {
        $listaArtigos = Artigo::getArtigosSite($request->search);
        $search = $request->search;
    } else {
        $listaArtigos = Artigo::getArtigosSite();
        $search = "";
    }
    
    return view('site.index', compact('listaArtigos', 'search'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    if ($artigo) {
        return view('site.artigo', compact('artigo'));
    }
    return redirect('site');
})->name('site.artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:autor');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function()
{
    Route::resource('artigos', 'ArtigosController')->middleware('can:autor');
    Route::resource('usuarios', 'UsuariosController')->middleware('can:eAdmin');
    Route::resource('autores', 'AutoresController')->middleware('can:eAdmin');
    Route::resource('administradores', 'AdministradoresController')->middleware('can:eAdmin');
});
