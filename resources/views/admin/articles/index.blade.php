@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <a href="{{ route('admin.home') }}" class="btn btn-success">Back</a>
                    <a href="{{ route('articles.create') }}" class="btn btn-success">Add Articles</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Posted By</th>
                                <th>Category</th>
                                <th>Likes</th>
                                <th>Number of comments</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- If there is no data show "there is no article" -->
                        <tbody class="table-group-divider">
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{$article -> title}}</td>
                                <td>{{$article -> user -> name}}</td>
                                <td>{{$article -> category -> name}}</td>
                                <td>{{$article -> likes}}</td>
                                <td>{{$article -> comments}}</td>
                                <td>{{ $article->created_at->diffForHumans() }}</td>
                                <td>{{ $article->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-success mr-3">View</a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary mr-3">Edit</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @if ($articles->count() === 0)
                            <tr>
                                <td colspan="4">There is no article</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection