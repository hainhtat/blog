@extends('layouts.admin.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Articles table</h6>
                </div>


                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Comments</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created And Edited</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center text-decoration-none">

                                                <h6 class="mb-0 text-sm">{{ $article->title }}</h6>
                                                <p class="text-xs text-secondary mb-0">Category - {{ $article->category->name }}</p>

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $article->user->name }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{ $article->comments->count() }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">Created {{ $article->created_at->diffForHumans() }}</span>
                                        <br>
                                        <span class="text-secondary text-xs font-weight-bold">Updated {{ $article->updated_at->diffForHumans() }}</span>

                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show article">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit article">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete article">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

        <nav class="d-flex justify-content-center">
            <ul class="pagination pagination-circle pg-blue">
                <li>{{ $articles->links() }}</li>
            </ul>
        </nav>
    </div>


</div>
@endsection