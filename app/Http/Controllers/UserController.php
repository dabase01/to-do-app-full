<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        return User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
    }
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user or !Hash::check($request->password,$user->password)){
            return 'Email or password failled';
        }
        $token = $user->createToken('todoapp');
       
        return $token->plainTextToken;
    }
    public function getme(Request $request){
        return $request->user();
    }
}
