@extends('layouts.base')

@section('content')
    @include('admin.includes.navbar')

    <section>
        <div class="container">
            <h1 class="h3">@yield('admin.title')</h1>

            @yield('admin.content')
        </div>
    </section>
@endsection
