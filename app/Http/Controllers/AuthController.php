<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{   public function logout(){
    Auth::logout();
    return redirect()->route('login');
}
    public function getLogin(){
        return view ('login');
    }
    public function postLogin(Request $request){
        $name=$request['name'];
        $password=$request['password'];
        if($name){
            $user=User::where('name', $name)->first();
            if($user){
                if($user->reg_status){
                    if($password){

                        if(Auth::attempt(['name'=>$name, 'password'=>$password])){
                            echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The user account authenticate successfully.</div>";

                        }else{
                            echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The selected password is invalid.</div>";

                        }

                    }else{
                        echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password field is required.</div>";

                    }
                }else{
                    echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The user account have not been activated.</div>";

                }
            }else{
                echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The selected user account was not found.</div>";

            }
        }else{
            echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The user name field is required.</div>";

        }

    }
    public function getRegister(){
        return view ('register');
    }
    public function postRegister(Request $request){
        $name=$request['name'];
        $email=$request['email'];
        $password=$request['password'];
        $password_again=$request['password_again'];
        $reg_code=rand(000000,999999);

        if($name){
            $user=User::where('name',$name)->first();
            if(!$user){
                if($email){
                    $mail=User::where('email', $email)->first();
                    if(!$mail){
                        if($password){
                            if($password_again){
                                if($password==$password_again){
                                    $user=new User();
                                    $user->name=$name;
                                    $user->email=$email;
                                    $user->password=bcrypt($password);
                                    $user->reg_code=$reg_code;
                                    $user->save();

                                     Mail::send('mail', ['user' => $user], function ($m) use ($user) {
                                        $m->from('hello@app.com', 'Your Application');

                                        $m->to($user->email, $user->name)->subject("Public Chat App");
                                    });

                                    echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The user account have been created, please check your email inbox and activate your account.</div>";


                                }else{
                                    echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password and password again must match.</div>";

                                }
                            }else{
                                echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password again field is required.</div>";

                            }

                        }else{
                            echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password field is required.</div>";

                        }
                    }else{
                        echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The selected email is already exists.</div>";

                    }
                }else{
                    echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The email field is required.</div>";

                }

            }else{
                echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The selected user name is already exists.</div>";

            }

        }else{
            echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The user name field is required.</div>";
        }
    }
}
