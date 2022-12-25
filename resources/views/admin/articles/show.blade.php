@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body justify-content-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-success mb-3">Back</a>
                    <div class="card">
                        <img src="{{asset('images/'.$article->image)}}" class="card-img-top img-fluid w-50" alt="...">
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

                            <ul class="list-group mt-3">
                                <li class="list-group-item active">
                                    <b>Comments ({{ count($article->comments) }})</b>
                                </li>
                                @foreach($article->comments as $comment)
                                <li class="list-group-item">
                                    {{ $comment->body }}
                                    <b>By {{$comment->user->name}}</b>
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
                </div>
            </div>
        </div>
    </div>
    @endsection