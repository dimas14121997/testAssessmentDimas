@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> User Management</h1>
  </div>

   
    @if (session()->has('succes'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      {{session('succes')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
      {{session('danger')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
   
  @can('isSupervisor')

    <a href="/user-management-add" class="btn btn-primary mb-3">Add User</a>
 
   @endcan
  
    <div class="table-responsive col-lg-8">
  
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          @can('isSupervisor')
          <th scope="col">Action</th>
            @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          @can('isSupervisor')
              
         
          <td>
            
            <a href="/user-management/{{$user->email}}" class="badge bg-warning"><span data-feather="edit">Edit</span></a>
            <form action="/user-management/{{$user->email}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('are you sure')"><span data-feather="x-circle">Delete</span></button>
            </form>

          </td>
           @endcan
        </tr>
        @endforeach
       
      
      </tbody>
    </table>
  </div>
        

@endsection