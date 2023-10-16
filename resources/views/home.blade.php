@extends('layouts.master')
@section('content')
            
            <h2>Users Informations</h2>
          
           @if(session()->has('message'))
           <p>{{ session()->get('message')}}</p>
           @endif
             <h4>welcome {{ auth()->user()->name }}</h4>
            <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
              <a href="{{route('create.user')}}" class="btn btn-primary">New</a>
              <table class="table">

                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user);

                  <tr>
                    <th scope="row">{{ $users->firstItem() + $loop->index}} </th>    
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}/td>

                    <td>
                        <a href="{{route('edit.user',encrypt($user->user_id))}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete.user',encrypt($user->user_id))}}" class="btn btn-danger">Delete</a>

                    </td>

                  </tr>
                  @endforeach
                </tbody>               
              </table>
           <div>
            {{$users->links()}}
           </div>
@endsection

