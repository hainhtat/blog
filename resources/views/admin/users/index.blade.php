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
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Profile</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Role</th>
                                    <th class="">Number of Posts</th>
                                    <!-- <th class="text-nowrap">Created At</th>
                                <th class="text-nowrap">Updated At</th> -->
                                    <th class="text-nowrap">Action</th>

                                </tr>
                            </thead>
                            <!-- If there is no data show "there is no category" -->
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-nowrap"><img src="https://ui-avatars.com/api/?background=random&color=random&name={{ $user->name }}" class="rounded-circle" width="30" height="30" alt="profile picture"></td>
                                    <td class="text-nowrap">{{ $user->name }}</td>
                                    <td class="text-nowrap">{{ $user->email }}</td>
                                    <td class="text-nowrap">@if($user->is_admin == 1) Admin @else User @endif</td>
                                    <td class="text-nowrap">{{ $user->articles->count() }}</td>
                                    <!-- <td class="text-nowrap">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-nowrap">{{ $user->updated_at->diffForHumans() }}</td> -->
                                    <td class="text-nowrap">
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-3">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-user-xmark"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if ($users->count() === 0)
                                <tr>
                                    <td colspan="4">There is no user.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-circle pg-blue">
                            <li>{{ $users->links() }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection