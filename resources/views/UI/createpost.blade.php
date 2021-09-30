@extends('layouts.app')

@section('title','createpost');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="padding: 20px">

                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                    
                    {{-- Starting Upload Post Form --}}
                    <form method="POST" action="{{ url('/createpost') }}" enctype="multipart/form-data">
                        @csrf                

                        <div class="form-group">
                          <label for="exampleFormControlInput1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Post Title" required>
                        </div>
   
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                        </div>
                        

                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Category</label>
                          <select class="form-control" name="category" id="exampleFormControlSelect1">
                            
                            @foreach ($categories as $category)
                            <option>{{ $category->name }}</option>
                            @endforeach
                            
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Content</label>
                          <textarea class="form-control" name="content" id="exampleFormControlTextarea1"  rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                      </form>

                    {{-- Ending Upload Post Form  --}}

                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection