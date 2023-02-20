<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [//aqui uso essas variáveis para peristir no banco
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    public function getUsers(string|null $search = null){
        $users = $this->where(function ($query) use($search) {
            if ($search) {
                $query->where('email', 'LIKE', "%{$search}%");//senão colocar o like e por '=' ou nada, e tirar o % e deixar somente o $search vai procurar o texto exato
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
       })->with('comments')//está trazendo da function comments todos os comentários, não sendo necessária outras consultas.
       //->get();//aqui era antes da paginação
       ->paginate(2);

       return $users;

    }

    public function comments() {
        return $this->hasMany(Comment::class);//one to many --> 1 pra muitos, 1 user(model) tem vários comments
    }

}
