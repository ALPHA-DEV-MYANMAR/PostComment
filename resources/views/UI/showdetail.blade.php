@extends('layouts.app')

@section('title','showdetail');

@section('content')
                  
    <div class="container">
        <div class="row">
            <div class="col-md-12 post-details">
                <img src={{ asset('/upload/'.$post->image) }} alt="" width="100%">
                    <br><br>
                    <small>
                        <strong>
                            <i class="fa fa-list"></i> Category:
                        </strong>
                                {{ $post->category }}
                            </small>
                            <br><br>
                            <h5><strong>{{ $post->title }}</strong></h5>

                            <p style="text-align: justify;">
                               {{ $post->content }}
                            </p>


                            <form method="POST">
                            @csrf
                                <button class="btn btn-sm btn-success like" formaction="{{ url('/like/'.$post->id) }}" 
                                   
                                   @if ($likestatus)
                                        @if ($likestatus->type == 'like')
                                        disabled
                                        @endif
                                   @endif
                                   
                                    >
                                    <i class="far fa-thumbs-up"></i> Like <span>
                   
                                            {{ $likes->count() }}
                        
                                    </span>
                                </button>
                            
                                <button class="btn btn-sm btn-danger like" formaction="{{ url('/dislike/'.$post->id) }}"

                                    @if ($likestatus)
                                        @if ($likestatus->type == 'dislike')
                                            disabled
                                        @endif
                                    @endif
                       
                                    >
                                     <i class="far fa-thumbs-down"></i> Dislike <span>
                                     
                                             {{ $dislikes->count() }}
                                
                                     </span>
                                </button>

                                <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                                    <i class="far fa-comment"></i> Comment <span>
                   
                                        {{ $contents->count() }}
                    
                                </span>
                                </button>
                                
                            </form>
                        
                            <br>
                            
                            {{-- Comment form --}}
                            <div class="comment-form" >
                                    <div class="collapse" id="collapseExample">
                                    <form action="{{ url('/comment/'.$post->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="comment" id="" cols="70" rows="3" required></textarea>
                                            <br>
                                    <button class="btn btn-primary btn-sm">
                                        <i class="far fa-paper-plane"></i> Submit
                                    </button>
                            </div>
                                    </form>
                                    <br>


                            <div class="comment-show">
                         
                            @foreach ($contents as $content)
                                <img src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" alt="" width="30px"> 
                                
                                <strong>{{ $content->user->name }}</strong> 
                                 
                                <div class=" comment-box mt-2">

                                    <div class="message-box">
                                        {{ $content->content }}
                                        <hr>
                                        
                                    </div>
                                
                            @endforeach
    

                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection