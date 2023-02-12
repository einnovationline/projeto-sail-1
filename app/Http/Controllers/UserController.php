<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Use_;

class UserController extends Controller{
    public function index(Request $request){
        //irá gerar o sql
        //$users = User::where('name', 'LiKE', "%{$request->name}%")->tosql();
        //dd($users);

        $search = $request->search;
        //dd($request->getQueryString());
        //$users = User::where('name', 'LiKE', "%{$request->name}%")->get();

       $users = User::where(function ($query) use($search) {
            if ($search) {
                $query->where('email', 'LIKE', "%{$search}%");//senão colocar o like e por '=' ou nada, e tirar o % e deixar somente o $search vai procurar o texto exato
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
       })->get();

        //return view('users.index', ['users' => $users]);
        return view('users.index', compact('users'));
    }

    public function show($id){
        //$user = User::where('id', $id)->first();
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function destroy($id){
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }

    public function create(){
        return view('users.create');
    }

    public function edit($id){
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));//aqui no compact ele v o user como a variável $user atribuida no if
    }

    public function update(StoreUpdateUserFormRequest $request, $id){

       // dd($request->all());

        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $data = $request->only('name','email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');
        //return redirect->route('users.show, $user->id');

        //$user = new User;
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->password = $request->password;
        //$user->save();
    }
}
