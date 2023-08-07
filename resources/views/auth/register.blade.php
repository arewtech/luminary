@extends('layouts.guest')
@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form action="{{ route('register') }}" method="post" class="row g-3 needs-validation">
                @csrf
                <div class="col-12">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" id="yourName" placeholder="joko ganteng">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                        placeholder="joko@luminary.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="form-control @error('username') is-invalid @enderror" id="yourUsername"
                            placeholder="joko">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms">
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
                                conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
