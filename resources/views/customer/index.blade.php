@extends('layouts.main')
@section('content')
    
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div>
            <h1 style="text-align: center;">Information Customer</h1>
          </div>
          <br>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                   
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">                                  
                <li class="nav-item active">
                  <a class="nav-link" href="">Sale </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('customer.create')}}">Add customer</a>
                </li>                
              </ul>
                <form class="form-inline my-2 my-lg-0">
                    
                    <input class="form-control mr-sm-2" type="search" placeholder="Search here" name="search" value="{{ $search }}">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            </nav>
                   
        </div>
    </div>
    </div>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
              <thead>
                <tr style="background-color: #03dffc">
                  <th scope="col">Id</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listCustomer as $customer)
                <tr>                 
                  <th scope="row">{{ $customer->id }}</th>
                  <td><img src="{{ asset('images/' . $customer->avt) }}" width="100px"></td>
                  <td>{{ $customer ->name }}</td>
                  <td>{{ $customer ->gender==1? "Male":"Female" }}</td>
                  <td>{{ $customer ->phone }}</td>
                  <td>{{ $customer ->email }}</td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
    </div>
{{ $listCustomer->appends([
    'search' => $search,
])->links() 
}}
@stop;