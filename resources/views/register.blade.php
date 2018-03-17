@extends('layouts.template')

@section('title') Register | Public Chat App @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="info"></div>
                <h1 class="text-primary text-center">Public Chat App</h1>
                <h3 class="text-center text-warning">Register</h3>
                <form id="regForm">
                    <div class="form-group">
                        <label for="name" class="control-label">Username</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_again" class="control-label">Password Again</label>
                        <input type="password" name="password_again" id="password_again" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnReg" class="btn btn-primary btn-block">Signup</button>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </form>
                Already have an account ? <a href="{{route('/')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            </div>
        </div>
    </div>

    @stop