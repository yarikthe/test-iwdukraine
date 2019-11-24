@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(Auth::user()->getRole('SUPERADMIN'))
                    <a href="/superadmin" class="m-1 btn btn-outline-info btn-lg">Back to SuperAdmin</a>
                @endif

                @if(Auth::user()->getRole('ADMIN'))
                    <a href="/admin" class="m-1 btn btn-outline-info btn-lg">Back to Admin</a>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Page 2 BLOG</h1>
                    <img src="https://media.timeout.com/images/105404217/630/472/image.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
