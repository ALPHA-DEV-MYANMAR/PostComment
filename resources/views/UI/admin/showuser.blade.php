@extends('layouts.app')

@section('title','showuser');

@section('content')


    <div class="container">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card" style="width: 100%">

                    {{-- @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif --}}
                   
                    <table class="table table-hover table-dark">
                        <thead class="thead thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Premission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-success"> {{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ url('/deleteuser/'.$user->id) }}" method="POST">
                                        @csrf 
                                        
                                        <a href="{{ url('/manageuser/'.$user->id) }}" type="button" class="btn btn-outline-primary">Manage</a>

                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
    
@endsection