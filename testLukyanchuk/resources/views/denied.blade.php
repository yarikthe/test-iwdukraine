@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                       {{ Auth::user()->name }} for you Permission Denied to this Page!
                    </p>

                    @if(Auth::user()->getRole('SUPERADMIN'))
                        <a href="/superadmin" class="m-1 btn btn-outline-info btn-lg">Back to SuperAdmin</a>
                    @endif

                    @if(Auth::user()->getRole('ADMIN'))
                        <a href="/admin" class="m-1 btn btn-outline-info btn-lg">Back to Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
