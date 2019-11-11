<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        if(request()->has('empty'))
        {

            $users = [];
        }
        else
        {
            $users = ['Patata','Frita','Cara de Pan','Lau','Perito'];
        }

        

        $title = 'Listado de usuarios';

        return view('users', compact('users', 'title'));

    }

    public function show($id){

        return view('users_show', compact('id'));
    }

    public function create_new_user()
    {
        return "El usuario nuevo se ha creado correctamente";
    }
}
