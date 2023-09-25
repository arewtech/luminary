@extends('layouts.guest')
@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>
            </div>
            <form action="{{ route('login') }}" method="post" class="row g-3 needs-validation">
                @csrf
                <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="text" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                        placeholder="john@luminary.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="yourPassword" placeholder="Min. 8 characters">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
