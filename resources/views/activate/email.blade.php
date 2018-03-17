@extends('layouts.template')

@section('title') Activate Account | Public Chat App @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="info"></div>
                <h1 class="text-primary text-center">Public Chat App</h1>
                <h3 class="text-center text-warning">Activate Account</h3>
                <p class="text-info">Input your valid email address to activate your account.</p>

                    <div class="form-group">
                        <label for="email" class="control-label">Email Address</label>
                        <input autofocus type="email" name="email" id="email" class="form-control">                    </div>



                    <div class="form-group">
                        <button type="button" id="btnActEmail" class="btn btn-primary btn-block">Next <span class="glyphicon glyphicon-forward"></span></button>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

                Don't have an account ? <a href="{{route('register')}}"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>
            </div>
        </div>
    </div>

@stop