@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{ route('categories.index') }}" class="btn btn-info text-capitalize">
                        Tags <i class="fa-sharp fa-solid fa-tags"></i>
                    </a>
                    <a href="{{ route('articles.index') }}" class="btn btn-warning text-capitalize">
                        Posts <i class="fa-solid fa-newspaper"></i>
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-dark text-capitalize">
                        Users  <i class="fa-solid fa-users"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection