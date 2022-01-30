@extends('layout.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">Register Now</h1>
                <form action="/register" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid                     
                    @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                    <label for="floatingInput">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>                
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid
                        
                    @enderror" id="username" placeholder="username" value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid
                    @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid
                    @enderror" name="password" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <p class="mt-3 d-block text-center">Already have an account? <a href="/login">Login now!</a></p>
            </form>
        </main>
    </div>
</div>

@endsection