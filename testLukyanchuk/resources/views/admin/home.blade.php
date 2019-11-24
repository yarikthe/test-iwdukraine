@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Page Standart Admin</div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br> <h3>Page access to you <strong>{{ Auth::user()->name }}</strong></h3>
                    <hr>
                    @can('about-page')
                         <a href="/about" class="btn btn-danger btn-lg">Page About</a>
                    @endcan
                    @can('blog-page')
                         <a href="/blog" class="btn btn-warning btn-lg">Page Blog</a>
                    @endcan
                    @can('page-page')
                         <a href="/page" class="btn btn-success btn-lg">Page Page</a>
                    @endcan                  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
