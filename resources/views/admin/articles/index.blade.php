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
                    <a href="{{ route('admin.home') }}" class="btn btn-success">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </a>
                    <a href="{{ route('articles.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Posted By</th>
                                    <th class="text-nowrap">Category</th>
                                    <th class="text-nowrap">Likes</th>
                                    <th class="text-nowrap">Number of comments</th>
                                    <th class="text-nowrap">Created At</th>
                                    <th class="text-nowrap">Updated At</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <!-- If there is no data show "there is no article" -->
                            <tbody class="table-group-divider">
                                @foreach ($articles as $article)
                                <tr>
                                    <td class="text-nowrap">{{$article -> title}}</td>
                                    <td class="text-nowrap"><a href="{{ route('users.show', $article->user->id) }}">{{$article -> user -> name}}</a></td>
                                    <td class="text-nowrap">{{$article -> category -> name}}</td>
                                    <td class="text-nowrap">{{$article -> likes}}</td>
                                    <td class="text-nowrap">{{count($article -> comments)}}</td>
                                    <td class="text-nowrap">{{ $article->created_at->diffForHumans() }}</td>
                                    <td class="text-nowrap">{{ $article->updated_at->diffForHumans() }}</td>
                                    <td class="text-nowrap">
                                        <div class="d-flex">
                                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-success mr-3">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary mr-3">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </a>
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
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
                    </div>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-circle pg-blue">
                            <li>{{ $articles->links() }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection