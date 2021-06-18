@extends('layout.app')
@section('content')
    <header class="masthead" style="background-image: url('dist/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Register</h1>
                        <span class="subheading">For Access the DashBoard </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="form-container">
        <form action="{{route('auth.Register')}}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
    <label>Fullname</label>
    <input type="text" name="name" required/>
    <label>Role</label>
     <select name="role"  style="width: 200px;margin-left: 850px;padding: 20px; border: 1px solid black ">
         <option value="Admin">Admin</option>
         <option value="Editor">Editor</option>
     </select>
    <label>Email</label>
    <input type="email" name="email" required/>
    <label>Password</label>
    <input type="password" name="password" required/>
    <button type="submit">Signup</button>
    </form>
</div>
@endsection
