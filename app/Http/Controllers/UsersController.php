<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UsersLogs;

class UsersController extends Controller
{

    public function index () 
    {
        echo "INDEX";
    }
    
    // list all users
    public function list () 
    {
        $active_users = Users::get()->all();
        return response($active_users, 200);
    }

    // list single user
    public function listAll (Request $request) 
    {

        $id = $request->route('id');

        if (Users::find($id)) {
            // user found
            $user_data = Users::where('id', $id)
                ->with('usersLogs', function($q){
                    $q->orderBy('created_at', 'DESC');
                    $q->take(5);
                })->get()->first(); 

            return response($user_data, 200);

        } else {
            // user not found
            return response('Usuário não encontrado.', 500);
        }

    }

    // update user
    public function update (UsersUpdateRequest $request) 
    {        

        $data = $request->validated();
        $id = $request->route('id');

        if (Users::find($id)) {
            
            // user found
            $user_logs = new UsersLogs();
            $user_logs->data_old = Users::find($id)->toJson();

            // update register
            if (Users::whereId($id)->update($data)) {

                $user = Users::find($id);
                $user_logs->data_new = Users::find($id)->toJson();
                $user->usersLogs()->save($user_logs);

                return response('Registro alterado com sucesso.', 200);
            }

        } else {
            // User not found
            return response('Usuário não encontrado.', 500);
        }

    }


    // insert new user 
    public function insert (UsersCreateRequest $request) 
    {

        $data = $request->validated();
       
        return Users::create($data)
            ? response('Registro criado com sucesso.', 200)
            : response('Registro não pode ser criado.', 500);

    }

    // delete user
    public function delete (Request $request) 
    {

        $id = $request->route('id');
        
        if ($user = Users::find($id)) {
            // user exists
            $user->delete();
            return response('Registro deletado com sucesso', 200);
        } else {
            // user do not exists
            return response('Registro não encontrado.', 500);
        }

    }
}
