@extends('layouts.main')
@section('content')
<div class="container"  style="align:center; width: 80%;">
        <div class="tieude" style="text-align:center"><h2>Add new Customer</h2></div>
        <br>
        <form action="{{ route('customers.store') }}"  class="was-validated" enctype="multipart/form-data" method="POST" style="height:300px;">
        @csrf
            <div class="form-group">
                <label for="uname">Image:</label>
                <input type="file" class="form-control" name="avt" placeholder="Avatar..." required>
                @error('avt')
                    <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="uname">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name customer..." name="name">
                @error('name')
                    <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="uname">Gender:</label>
                <input type="radio" name="gender" value="1" checked> Male
                <input type="radio" name="gender" value="0"> Female
                @error('gender')
                 <small class="help-block">{{ $message }}</small>
                @enderror
            </div> 
            <div class="form-group">
                <label for="uname">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone customer..." name="phone">
                @error('phone')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>   
            <div class="form-group">
                <label for="uname">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Email customer..." name="email">
                @error('email')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>             
            <br>
        <button class="btn btn-primary">Add</button>
        </form>

</div>
@endsection