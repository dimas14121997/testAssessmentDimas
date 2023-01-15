@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Users</h1>
  </div>
    <div class="d-flex justify-content-start">
    <a href="/user-management" class="btn btn-danger">Back</a>
  </div>
  
  <div class="row justify-content-center">
  <div class="col-md-4">

    <main class="form-signin mt-2">
      
      <form action="/user-management" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror " id="username" placeholder="username" required value="{{old('username')}}">
          <label for="username">username</label>
          @error('username')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="name@example.com" required value="{{old('email')}}">
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="role" class="form-control @error('role') is-invalid @enderror " id="role" placeholder="role" required value="{{old('role')}}">
          <label for="role">role</label>
          @error('role')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror " id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Add Users</button>
        </form>
       
    </main>
  </div>
</div>
@endsection