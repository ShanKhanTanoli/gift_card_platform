@extends('layouts.dashboard')

@section('content')
    <div class="page-header align-items-start min-vh-100">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-12 m-auto text-center">
                    <h1 class="display-1 text-bolder text-dark">Error 500</h1>
                    <h2 class="text-dark">Erm. Internal Server Error</h2>
                    <p class="lead text-dark">We suggest you to go to the homepage while we solve this issue.</p>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark mt-4">Go to Homepage</a>
                </div>
            </div>
        </div>
    </div>
@endsection
