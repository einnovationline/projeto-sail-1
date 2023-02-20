<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Builder\Use_;

class UserController extends Controller{

    //Protected somente a própria classe e as classes que herdam dela podem acessar o atributo ou método.
    protected $model;

    public function __construct(User $user){
        //o que está na passagem de parâmetro é = a $user = new User dentro da function

        $this->model = $user;
    }

    public function index(Request $request){
        //irá gerar o sql
        //$users = User::where('name', 'LiKE', "%{$request->name}%")->tosql();
        //dd($request->getQueryString());
        //$users = User::where('name', 'LiKE', "%{$request->name}%")->get();

       $users = $this->model->getUsers(search: $request->search ?? '');

        //return view('users.index', ['users' => $users]);
        return view('users.index', compact('users'));
    }

    public function show($id){
        //$user = User::where('id', $id)->first();
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function destroy($id){
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $user->delete();//apagar um usuario caso ele tiver comentário  onDelete("CASCADE");

        return redirect()->route('users.index');
    }

    public function create(){
        return view('users.create');
    }

    public function edit($id){
        if (!$user =$this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));//aqui no compact ele v o user como a variável $user atribuida no if
    }

    public function update(StoreUpdateUserFormRequest $request, $id){
       // dd($request->all());
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name','email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        if ($request->image) {
            if ($user->image && Storage::exists($user->image)){//pega se existe ou não o arquivo para o usuário
                Storage::delete($user->image);
            }

            $data['image'] = $request->image->store('users');

        }

            $user->update($data);

        return redirect()->route('users.index');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {//a coluna image irá receber o caminho abaixo, e salvar a imagem no caminho storage/app/public/users q será o nome da pasta criad
            $data['image'] = $request->image->store('users');
            //***para nomear uma imagem com a data atual, usa as linhas de código abaixo.
            //$extension = $request->image->getClientOriginalExtension();
            //$data['image'] = $request->image->storeAs('users', now() . ".{$extension}");
        }

        $user = $this->model->create($data);

        return redirect()->route('users.index');
        //return redirect->route('users.show, $user->id');

        //$user = new User;
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->password = $request->password;
        //$user->save();
    }
}
