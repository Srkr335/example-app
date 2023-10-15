@extends('layouts.master')
@section('title','New Users')
@section('content')
  <div class="container">
    <form action="{{ route('save.user') }}" method="POST" enctype="multipart/form-data">
@csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>


        <div class="form-group">
          <label >Email address</label>
          <input type="email" class="form-control"   name="email" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label >Date_Of_Birth </label>
            <input type="text" class="form-control"  name="dateofbirth" placeholder="Date Of Birth ">
          </div>

          <div class="form-group">
            <label >Image </label>
            <input type="file" class="form-control"  name="image" >
          </div>


          <div class="form-group">

            <label >Status </label>
            <select class="form-control" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>        
        <p></p>
        </div>

         
       
        <p></p>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>  
@endsection
