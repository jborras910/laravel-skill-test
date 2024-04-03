

@extends('layouts.layout')
@section('title', 'Registration')

@section('content')
    <div class="container" >
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif
        
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form class="form" method="post" action="{{route('user.update', ['user' => $user])}}">
            @csrf
            @method('put')
        <div class="row">
          <div class="form-group col-md-4">
            <label >First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
          </div>
          <div class="form-group col-md-4">
            <label >Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
          </div>
          <div class="form-group col-md-4">
            <label >Middle Name</label>
            <input type="text" name="middle_name" class="form-control" value="{{$user->middle_name}}">
          </div>

          <div class="form-group col-md-6">
            <label >Contact Number</label>
            <input type="text" name="contact" class="form-control" value="{{$user->contact}}">
          </div>

          <div class="form-group col-md-6">
            <label >Address</label>
            <input type="text" name="address" class="form-control" value="{{$user->address}}">
          </div>

          <div class="form-group col-md-6">
            <label >Birthday</label>
            <input type="date" style="width: 100%; padding: 10px" name="birthday" value="{{$user->birthday}}">
          </div>

          <div class="form-group col-md-6">
            <label >Gender</label>
            <select class="form-select" name="gender" id="" value="{{$user->gender}}">
            <option value="male">Male</option>
            <option value="female">Female</option>
           </select>
        </div>


        
        </div>
            

            {{-- <div class="form-group">
              <label >Password</label>
              <input type="password" name="password" class="form-control"  placeholder="Password" value="{{$user->password}}">
            </div> --}}
    
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger text-light" href="{{route('home')}}">Cancel</a>
          </form>
    </div>
@endsection
