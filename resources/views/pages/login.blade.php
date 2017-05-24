@extends('layouts.login')

@section('title', 'SINAP - Login')

@section('content')

    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="/login" method="POST">
                        {{ csrf_field() }}
                        <h1>Login Form</h1>
                        <div>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-default" value="Log In">
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>

@endsection