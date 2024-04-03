@extends('layouts.layout')
@section('title', 'Login')

@section('content')
<div class="container">

    <div class="mt-5">
        <form class="form" method="post" action="{{ route('login.post') }}">
            @csrf
            @if(Session::has('status'))
            <div class="alert {{ session('status') == 'Registration Successfully' ? 'alert-success' : 'alert-danger' }}">
                {{ session('status') }}
            </div>
            @endif

            <div class="form-group">
                <label>Email address</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input value="{{ old('password') }}" type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <div class="form-footer">
                <p>Don't have an account? Register <a href="{{ route('registration') }}">here</a></p>
            </div>
        </form>
    </div>
</div>

@endsection
