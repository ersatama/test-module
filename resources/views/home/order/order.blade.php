@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row min-vh-100 flex-column flex-md-row mt-4">
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                @include('home.layouts.sidebar')
            </aside>
            <main class="col col-md-10 bg-faded flex-grow-1">
                <router-view></router-view>
            </main>
        </div>
    </div>
@endsection
