@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    This is the welcome page

                    <!-- 'about' is the name of our route -->
                    <!-- a route doesn't have to be named, but to do this stuff it does -->
                    Read more <a href="{{ route('about') }}"> about us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
