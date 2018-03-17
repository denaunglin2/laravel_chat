@extends('layouts.template')

@section('title')Welcome | Public Chat App @stop

@section('content')
        @include('nav_bar')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-info"><span class="glyphicon glyphicon-check"></span> Group Chat</div>
                <div class="alert alert-info"><span class="glyphicon glyphicon-check"></span> Chat By User</div>

            </div>
        </div>
    </div>

    @include('footer')
    @stop