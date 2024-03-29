@extends('layouts.layout')
@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">{{ __('ideas.login')}}</h3>
                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}">
                    @error('email')
                        <p class="text-danger mt-2">{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <p class="text-danger mt-2">{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="{{ __('ideas.login')}}">
                    <div class="text-right mt-2 float-end">
                        <a href="/register" class="text-dark">{{ __('ideas.register')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
