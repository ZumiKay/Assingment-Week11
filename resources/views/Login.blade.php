@extends('layout.app')
@section('content')
    <header class="masthead" style="background-image: url('dist/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Login</h1>
                        <span class="subheading">Welcome To Our Websites </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="form-container">

        <form action="{{route('auth.Login')}}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
            <label>Email</label>
            <input type="email" name="email" required/>
            <label>Password</label>
            <input type="password" name="password" required/>
            <button type="submit">Signin</button>
             <a style="background-color: #6d778b; width: 400px; margin-left: 750px; border-radius: 20px; margin-top: 10px" href="{{route('auth.registerform')}}"> Create Account </a>
        </form>
    </div>
@endsection
