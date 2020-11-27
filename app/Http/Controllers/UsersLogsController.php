<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UsersLogs;

class UsersLogsController extends Controller
{
    public function listAll (Request $request) 
    {

        $start = $request->route('start');
        $limit = $request->route('limit');

       if  (! is_numeric($start) || ! is_numeric($limit)) {
            // limit or start are not numbers
            return response('Os valores de start e limit precisam ser numéricos.', 500);

       } else if ($limit <= $start) {
            // limit is lower or equal to start
            return response('O número limit não pode ser menor ou igual ao start.', 500);

       } else {
            // limit is greater than start and they are both numbers
            $start = $start - 1;
            $limit = $limit - 1;
            
            $logs = UsersLogs::skip($start)
                ->take($limit)
                ->orderBy('created_at', 'DESC')
                ->paginate(5);
            
            return response($logs, 200);
       }
        
    }

    public function listUserLogs (Request $request) 
    {

        $id = $request->route('id');
        $start = $request->route('start');
        $limit = $request->route('limit');

        if (! is_numeric($id)) {
            // id is not a number
            return response('O valor de id precisa ser numérico.', 500);
       
        } else if (! is_numeric($start) || ! is_numeric($limit)) {
            // limit or start aren't numbers
            return response('Os valores de start e limit precisam ser numéricos.', 500);

        } else if ($limit <= $start) {
            // limit is lower or equal to start
            return response('O número limit não pode ser menor ou igual ao start.', 500);

        } else {
            // limit is greater than start and they are both numbers
            $start = $start - 1;
            $limit = $limit - 1;
            
            if ($user = Users::find($id)) {
                // user found
                $logs = $user->usersLogs()
                    ->skip($start)
                    ->take($limit)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5);

                return response($logs, 200);

            } else {
                // user is not found
                return response('Usuário não encontrado.', 500);
            }
        }
       
    }
}
