<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User ;
use Auth ;

class ProfileController extends Controller
{

    public function index()
    {

    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input['name'] = $request->name ;
        $input['email'] = $request->email ;
        if($request->password != null or $request->password != ''){
            $input['password'] = Hash::make($request->password) ;
        }
        $user->update($input) ;
        return response()->json($user);
    }

}
