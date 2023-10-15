@extends('layouts.master')
@section('title','New Users')
@section('content')
  <div class="container">
    <form action="{{ route('update.user') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{encrypt($user->user_id)}}">
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name">
          </div>


        <div class="form-group">
          <label >Email address</label>
          <input type="email" class="form-control"   name="email" value="{{$user->email}}" placeholder="Email">
        </div> 
        </div>
        
        <div class="form-group">
            <label >Date_Of_Birth </label>
            <input type="text" class="form-control"   name="dateofbirth"  value="{{$user->date_of_birth_formatted}}"  placeholder="Date Of Birth ">
          </div>

          <div class="form-group">

            <label >Status </label>
            <select class="form-control" value="{{$user->status}}" name="status">
                <option value="1" @if($user->status == 1) selected="selected" @endif>Active</option>
                <option value="0"@if($user->status == 0) selected="selected" @endif>Inactive</option>
            </select>        
        <p></p>
        </div>

         
       
        <p></p>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>  
@endsection
