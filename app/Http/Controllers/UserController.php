<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //all
    public function index(){
      return User::all();
    }

    //show
    public function show(User $user){
      return $user;
    }

    //create
    public function store(Request $request){
      $User = User::create($request->all());
        return response()->json($user, 201); //201 return object created
    }

    //update
    public function update(Request $request, User $user){
      $user->update($request->all());
        return response()->json($article, 200); //200 return success
    }

    //delete
    public function delete(User $user){
      $user->delete();
        return response()->json(null, 204); //204 return no content
    }
}
