@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Users</h1>
  </div>
    <div class="d-flex justify-content-start">
    <a href="/vendor" class="btn btn-danger">Back</a>
  </div>
  
  <div class="row justify-content-center">
  <div class="col-md-4">

    <main class="form-signin mt-2">
      
      <form action="/vendor-add" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-floating">
          <input type="number" name="goods_gty" class="form-control @error('goods_gty') is-invalid @enderror " id="goods_gty" placeholder="name@example.com" required value="{{old('goods_gty')}}">
          <label for="goods_gty">Goods Gty</label>
          @error('goods_gty')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="file" name="file" class="form-control @error('file') is-invalid @enderror " id="file" placeholder="file" required value="{{old('file')}}">
          <label for="file">upload file</label>
          @error('file')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Add Vendor</button>
        </form>
       
    </main>
  </div>
</div>
@endsection