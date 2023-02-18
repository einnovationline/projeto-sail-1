<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Comment,User};
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\StoreUpdateCommentFormRequest;
use App\Http\Requests\StoreUpdateCommentFormRequest as RequestsStoreUpdateCommentFormRequest;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user){
        //o que está na passagem de parâmetro é = a $comment = new Comment dentro da function
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId) {
        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        //dd($request->search);//--> pega o dado do index <input type="text" name="search" placeholder="Pesquisar">

        $comments = $this->comment->getComments(search: $request->search ?? '');

        //$comments = $user->comments()->where('body', 'LIKE', "%{$request->search}%")->get();
//dd($comments);
        return view('users.comments.index', compact('user', 'comments'));//pasta view users, subpasta comment e arquivo index.blade.php
    }

    public function create($userId) {
        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(RequestsStoreUpdateCommentFormRequest $request, $userId) {
        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function update(RequestsStoreUpdateCommentFormRequest $request, $id) {
        if (!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }

        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }

    public function edit($user_id, $id){
        if (!$comment = $this->comment->find($id))
            return redirect()->back();

        $user = $comment->user;//tava dando o erro Undefined property: Illuminate\Database\Eloquent\Relations\BelongsTo::$name quando coloquei no user o ()

//dd(compact('user', 'comment'));
        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function destroy($id){
        if (!$comment = $this->comment->find($id))
            return redirect()->route('comments.index');

        $comment->delete();

        return redirect()->route('comments.index', $id);
    }
}
