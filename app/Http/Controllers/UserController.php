<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function getAllUser()
    {
        $user = User::select('id','email','name')->get();
        return compact('user');
    }

    public function CrearUser(Request $request)
    {
        User::create($request->all());
        return 'Compra Creado Exitosamente';
    }
}