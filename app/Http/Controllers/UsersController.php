<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return view("login.create");
    }

    public function store(Request $request){
        $data = $request->except(["token"]);
        $data["password"] = Hash::make($data["password"]);
        
        $user = User::create($data);

        Auth::login($user);


        return to_route("series.index");
    }
}
