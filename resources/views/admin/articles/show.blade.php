@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body justify-content-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-success mb-3">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </a>
                    <div class="card">

                        <!-- @if($article->image)
                        <img src="{{asset('storage/'.$article->image)}}" class="card-img-top" alt="...">
                        @else
                        <img src="{{$article->image_url}}" class="card-img-top" alt="...">
                        @endif -->

                        <img src="{{$article->image}}" class="card-img-top w-50" alt="...">


                        <div class="card-body">
                            <h5 class="card-title bold">{{$article->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$article->category->name}} . {{$article->user->name}} . {{$article->created_at}}</h6>

                            <p class="card-text">{{$article->body}}</p>
                            <a href="{{route('articles.edit', $article->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('articles.destroy', $article->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>


                        </div>


                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{session('success')}}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{session('error')}}
            </div>
            @endif
            <ul class="list-group mb-2 mt-3">
                <li class="list-group-item active">
                    <b>Comments ({{ count($article->comments) }})</b>
                </li>
                @foreach($article->comments as $comment)
                <li class="list-group-item">
                    <form action="{{route('comments.destroy', $comment->id)}}" method="POST" class="d-inline float-end">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    {{ $comment->body }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
                @endforeach
            </ul>

            <form action="{{route('comments.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="body">Comment</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <input type="hidden" name="article_id" value="{{$article->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>
    @endsection