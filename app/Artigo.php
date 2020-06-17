<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'dataPublicacao'];

    protected $dates = ['deleted_at'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getArtigos($paginate)
    {
        /*$listaArtigos = Artigo::select('id','titulo','descricao', 'user_id', 'dataPublicacao')->with('user:id,name')->paginate($paginate);

        foreach ($listaArtigos as $artigo) {
            //$artigo->user_id = User::find($artigo->user_id)->name;
            $artigo->user_id = $artigo->user->name;
            unset($artigo->user);
            //$artigo->user;
        }*/
        
        $response = DB::table('artigos')
                            ->join('users', 'users.id', '=', 'artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao', 'users.name', 'artigos.dataPublicacao')
                            ->whereNull('deleted_at')
                            ->paginate(5);

        return $response;
    }
}
