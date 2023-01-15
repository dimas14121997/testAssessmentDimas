@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-4">

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('loginError')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <main class="form-signin mt-5">
      <h1 class="h3 mb-3 fw-normal text-center">Login Please</h1>
  
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus required value="{{old('email')}}">
          <label for="email">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
       
    </main>
  </div>
</div>

@endsection