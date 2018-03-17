@extends('layouts.template')

@section('title') Login | Public Chat App @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="info"></div>
                <h1 class="text-primary text-center">Public Chat App</h1>
                <h3 class="text-center text-warning">Login</h3>
                <form id="loginForm">
                    <div class="form-group">
                        <label for="name" class="control-label">Username</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="button" id="btnLogin" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </form>
                Don't have an account ? <a href="{{route('register')}}"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>
            </div>
        </div>
    </div>

@stop