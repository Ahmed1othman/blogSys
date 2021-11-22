@extends('admin.layouts.master-auth')
@section('title')
    Admin Login
@endsection

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Login</h3>
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control p_input" id="email" name="email" :value="old('email')" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control p_input">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="remember_me" name="remember" class="form-check-input"> Remember me </label>
                                </div>
                                <a href="#" class="forgot-pass">Forgot password</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>

@endsection





