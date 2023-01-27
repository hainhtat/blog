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

                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-tags"></i>
                    </a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- If there is no data show "there is no category" -->
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-3">
                                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @if ($categories->count() === 0)
                            <tr>
                                <td colspan="4">There is no category</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-circle pg-blue">
                            <li>{{ $categories->links() }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection