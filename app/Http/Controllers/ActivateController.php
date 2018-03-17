<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class ActivateController extends Controller
{
    public function getEmail(){
        return view ('activate.email');
    }
    public function checkEmail(Request $request){
        $email=$request['email'];
        if($email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                Session::put('email', $user->email);
                echo "<div class='alert alert-success'>Email address is valid.</div>";
            } else {
                echo "<div class='alert alert-danger'>The selected email address was not found.</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>The email address field is required.</div>";

        }
    }

    public function getCode(){
        if(Session::has('email')) {
            return view('activate.code');
        }else{
            return redirect()->route('activate.email');
        }
    }
    public function checkCode(Request $request){
        $reg_code=$request['reg_code'];
        $email=Session::get('email');
        $user=User::where('email', $email)->first();
        if($reg_code){
            if($reg_code==$user->reg_code){
                $user->reg_status=1;
                $user->update();
                Session::forget('email');
                echo "<div class='alert alert-success'>Your account have been activated, you can login now.</div>";

            }else{
                echo "<div class='alert alert-danger'>The selected activation code is invalid.</div>";

            }
        }else{
            echo "<div class='alert alert-danger'>The activation code field is required.</div>";
        }
    }
}
