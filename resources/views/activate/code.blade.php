@extends('layouts.template')

@section('title') Activate Account | Public Chat App @stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="info"></div>
                <h1 class="text-primary text-center">Public Chat App</h1>
                <h3 class="text-center text-warning">Activate Account</h3>
                <p class="text-info">Input your registration code from email inbox to activate your account.</p>

                    <div class="form-group">
                        <label for="reg_code" class="control-label">Activation Code</label>
                        <input autofocus type="text" name="reg_code" id="reg_code" class="form-control">
                    </div>



                    <div class="form-group">
                        <button type="button" id="btnRegCode" class="btn btn-primary btn-block">Submit </button>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

                Don't have an account ? <a href="{{route('register')}}"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>
            </div>
        </div>
    </div>

@stop