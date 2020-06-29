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

        $user = auth()->user();
        
        if ($user->admin == "S") {
            $response = DB::table('artigos')
                            ->join('users', 'users.id', '=', 'artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao', 'users.name', 'artigos.dataPublicacao')
                            ->whereNull('deleted_at')
                            ->orderBy('artigos.id', 'DESC')
                            ->paginate(5);
        } else {
            $response = DB::table('artigos')
                            ->join('users', 'users.id', '=', 'artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao', 'users.name', 'artigos.dataPublicacao')
                            ->whereNull('deleted_at')
                            ->where('artigos.user_id', $user->id)
                            ->orderBy('artigos.id', 'DESC')
                            ->paginate(5);
        }

        return $response;
    }
    
    public static function getArtigosSite($search = null)
    {
        if ($search) {
            $response = DB::table('artigos')
                            ->join('users', 'users.id', '=', 'artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao', 'users.name as autor', 'artigos.dataPublicacao')
                            ->whereNull('artigos.deleted_at')
                            ->whereDate('artigos.dataPublicacao', '<=', date('Y-m-d'))
                            ->where(function($query) use ($search) {
                                $query->orWhere('artigos.titulo', 'like', '%' . $search . '%')
                                        ->orWhere('artigos.descricao', 'like', '%' . $search . '%');
                            })
                            ->orderBy('artigos.dataPublicacao', 'DESC')
                            ->get();
        } else {
            $response = DB::table('artigos')
                            ->join('users', 'users.id', '=', 'artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao', 'users.name as autor', 'artigos.dataPublicacao')
                            ->whereNull('artigos.deleted_at')
                            ->whereDate('artigos.dataPublicacao', '<=', date('Y-m-d'))
                            ->orderBy('artigos.dataPublicacao', 'DESC')
                            ->get();
        }
        
        return $response;
    }
}
