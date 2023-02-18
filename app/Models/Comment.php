<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Comment extends Model {
    use HasFactory;

    //$fillable estipula quais colunas podem ser preenchidas no migrate que possui o mesmo nome
    protected $fillable = ['body','visible'];
    protected $casts = ['visible' => 'boolean'];

    //criado na aula https://academy.especializati.com.br/aula/criar-model-migration-e-relacionamentos-de-comentarios-no-laravel
    public function user () {
        return $this->belongsTo(User::class);//pega da entidade mais fraca/dependente para o pai/forte.
    }

    public function getComments(string|null $search = null){
        $comments = $this->where(function ($query) use($search) {
            if ($search) {
                $query->where('body', 'LIKE', "%{$search}%");
            }
        })->get();

        return $comments;
    }


}
