@extends('layouts.app')

@section('title','manageuser');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
    
            <div class="col-md-4">

                <div class="card" style="padding: 10px" >
                    <form action="{{ url('/update/'.$users->id) }}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name:</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                          value="{{ $users->name }}">
                        </div>
    
                        <div class="form-group">
                          <label for="exampleInputPassword1">Email:</label>
                          <input type="text" name="email" class="form-control" id="exampleInputPassword1" 
                          value="{{ $users->email }}">
                        </div>
    
                        @foreach ($roles as $role)
    
                        <div class="form-check">
                            <input type="checkbox" name="role_ids[]" class="form-check-input" value="{{ $role->id }}" id="exampleCheck1"
                            
                            @foreach ($users->roles as $userRole)
                                @if ($userRole->name == $role->name)
                                checked
                                @endif
                            @endforeach
    
                            >                   
    
                            <label class="form-check-label" for="exampleCheck1">{{ $role->name }}</label>
                       
                        </div>
    
                        @endforeach
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        <div class="col-md-4"></div>
    </div>
</div>

    
@endsection