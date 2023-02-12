<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        //no bash do container "docker-compose exec laravel.test bash" faz o comando "php artisan route:list"
        //irá mostrar as rotas, no PUT, a identificação é o o id, abaixo a variável $id pega o valor
        //dessa rota, senão achar irá colocar null = ''
        //dd($this->segment(2));
        //dd($this->id);
        $id = $this->id ?? '';

        //no email a unique ele pega da tabela users o campo e-mail e compara se a variável é o msm do id
        $rules = [
            'name' => 'required|string|max:255|min:5',
            'email' => ['required', 'email', "unique:users,email,{$id},id",],
            'password' => ['required', 'min:5', 'max:15']
        ];

        //verifica se o método é o put que faz o update, como está fazendo o update se estiver em branco não
        //tem problema
        if ($this->method('PUT')){
            $rules['password'] = ['nullable', 'min:5', 'max:15'];

        return $rules;
        }
    }
}
