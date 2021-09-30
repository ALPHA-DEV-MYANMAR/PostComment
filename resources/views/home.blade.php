@extends('layouts.app')

@section('title','home');

@section('content')
<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-8">

            {{-- show all post --}}

            <div class="container" >
                <div class="row">
                    
                    <div class="col-md-12"> 

                        <br>

                        <form action="{{ url('/search') }}" method="GET">
                            @csrf
                            <div class="input-group rounded">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                  aria-describedby="search-addon" name="search_data" />
                                
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-search"></i>Search
                                    </button>
    
                                </span>
                            </div>
                        </form>
   
                        <br>

                            @foreach ($categories as $category)

                            <a href="{{ url('/search_category/'.$category->name) }}" type="button" class="btn btn-outline-primary">{{ $category->name }}</a>

                            @endforeach

                            <a href="{{ url('/home') }}" type="button" class="btn btn-outline-danger">All</a>

                        <br>

                        <hr>

                        @foreach ($posts as $post)

                        <legend>Title : {{ $post->title }}</legend>

                        <legend>Category : {{ $post->category }}</legend>
                        
                        {{-- <img src="{{ asset('/upload/'.$post->image) }}" class="img-fluid" alt="Responsive image">  --}}
                        <img src={{ asset('/upload/'.$post->image) }} alt="" width="100%">                

                        <p>{{ substr($post->content,0,300) }}</p>

                        <a href="{{ url('/createpost/'.$post->id) }}" type="button" class="btn btn-primary">
                            Detail>>
                        </a>
                        
                        <hr style="background-color: black">

                        @endforeach

                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection 
