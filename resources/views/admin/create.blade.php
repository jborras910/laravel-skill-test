@extends('layouts.layout')
@section('title', 'add account')

@section('content')
    <div class="container">
    
        
        <form class="form" method="post" action="{{route('user.store')}}">
          @csrf
          @method('post')
       <div class="row">
          <div class="form-group col-md-4">
            <label >First Name</label>
            <input type="text"  value="{{ old('first_name') }}" name="first_name" class="form-control" placeholder="First Name...">
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <div class="form-group col-md-4">
            <label >Last Name</label>
            <input type="text" value="{{ old('last_name') }}"  name="last_name" class="form-control" placeholder="Last Name...">
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <div class="form-group col-md-4">
            <label >Middle Name</label>
            <input type="text" value="{{ old('middle_name') }}"  name="middle_name" class="form-control" placeholder="Middle Name...">
            @error('middle_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="form-group col-md-6">
            <label >Contact Number</label>
            <input type="text" value="{{ old('contact') }}" name="contact" class="form-control" placeholder="Contact Number...">
            @error('contact')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="form-group col-md-6">
            <label >Address</label>
            <input type="text"  value="{{ old('address') }}" name="address" class="form-control" placeholder="Enter Address...">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="form-group col-md-6">
            <label >Birthday</label>
            <input type="date" style="width: 100%; padding: 10px" name="birthday">
            @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <div class="form-group col-md-6">
            <label >Gender</label>
          <select value="{{ old('gender') }}" style="width: 100%; padding: 10px" class="form-select" name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          @error('gender')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group col-md-12">
          <label >Email address</label>
          <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Email...">
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group col-md-12">
          <label >Password</label>
          <input  value="{{ old('password') }}" type="password" name="password" class="form-control"  placeholder="Password...">
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        </div>
       </div>
  
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-danger text-light" href="{{route('login')}}">Cancel</a>
        </form>
    </div>
@endsection
