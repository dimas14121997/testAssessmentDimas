@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendor</h1>
  </div>
    @canany(['isSupervisor','isAdmin'])

    <a href="/vendor-form" class="btn btn-primary mb-3">Add Vendor</a>
 
     @endcanany
  
    <div class="table-responsive col-lg-8">
  
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">File Name</th>
          <th scope="col">Path</th>
          <th scope="col">Qty</th>
          <th scope="col">Upload Date</th>
          @canany(['isSupervisor','isVendor'])
          <th scope="col">Action</th>
          @endcanany
        </tr>
      </thead>
      <tbody>
        @foreach ($vendors as $vendor)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$vendor->filename}}</td>
          <td>{{$vendor->path}}</td>
          <td>{{$vendor->goods_gty}}</td>
          <td>{{$vendor->upload_date}}</td>
            @canany(['isSupervisor','isVendor'])
              
         
          <td>
            <a href="document/{{$vendor->filename}}" ><button class="btn btn-success" type="button">Download</button></a>
          </td>
           @endcanany
        </tr>
        @endforeach
       
      
      </tbody>
    </table>
@endsection