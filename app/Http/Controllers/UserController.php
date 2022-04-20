<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function user_register_or_login(Request $req) {
        
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);

        $user = User::where('email', $req->email)->first();
        if($user) {

            /* User will be logged In */
            if(Hash::check($req->password, $user->password)) {

                $req->session()->put('user', [$user->uid, $user->email, $user->fullname]);
                return redirect('/todos');

            } else {
                return back()->with('error', 'Password is incorrect!');
            }


        } else {
            
            /* User get's registered */
            $user = new User;
            $user->uid = uniqid();
            $user->email = $req->email;
            $user->password = Hash::make($req->password);

            $response =  $user->save();
            if($response) {
                $req->session()->put('user', [$user->uid, $user->email, $user->fullname]);
                return redirect('/todos');
            } else {
                return back()->with('error', "Whoop's something went wrong! Please try agian later");
            }
        }
    }

    public function logout(Request $req) {
        
        if($req->session()->has('user')) {
            $req->session()->flush();
        }

        return redirect('/');
    }
}

