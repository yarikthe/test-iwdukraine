@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to HOME page</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                   
                    <div class="bg-default p-2">
                        name: <i class="p-2 bg-dark rounded text-light">{{ Auth::user()->name }}</i>
                        <hr>
                        role: 
                        @if(Auth::user()->getRole('SUPERADMIN'))
                            <i class="p-2 bg-dark rounded text-light">Super Admin</i>
                            <br>
                            Access to your page here:
                            <a href="/superadmin" class="m-1 btn btn-info btn-lg">Page here</a>

                            <hr>
                            
                            <img class="shadow" src="data:image/png;base64,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">
                        @endif

                        @if(Auth::user()->getRole('ADMIN'))
                            <i class="p-2 bg-dark rounded text-light">Standart Admin</i>
                            <hr>
                            Access to your page here:
                            <a href="/admin" class="m-1 btn btn-info btn-lg">Page here</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
