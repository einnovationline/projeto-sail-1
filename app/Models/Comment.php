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

    public function user () {
        return $this->belongsTo(User::class);
    }

}
