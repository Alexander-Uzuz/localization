@extends('layouts.main')

@section('main.title', trans('pluralization.title'))

@section('main.content')
    @php($productsCount = 123)

    {{ trans_choice('pluralization.example', $productsCount) }}
@endsection
