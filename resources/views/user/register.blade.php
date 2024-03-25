@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    @error('name')
                        <p class="text-danger mt-2">{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    @error('email')
                        <p class="text-danger mt-2">{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <p class="text-danger mt-2">{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Register">
                    <div class="text-right mt-2 float-end">
                        <a href="/login" class="text-dark">Login here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
