@extends('layouts.master')
@section('content')
    <!-- content row -->
    <div class="row content-holder login-area">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <div class="row">
                <div class="col-md-4 col-md-offset-3 login">
                    <h4>Admin Login</h4>
                    <form class="" action="{{route('login')}}" method="POST">
                        <div class="form-group">
                            <label class="label login-label" for="username">Username</label>
                            <input id="username" class="form-control login-input" type="text" name="username" >
                        </div>
                        <div class="form-group">
                            <label class="label login-label" for="password">Password</label>
                            <input id="password" class="form-control login-input" type="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success btn-login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content row -->
@stop