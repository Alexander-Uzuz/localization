@extends('layouts.main')

@section('main.title', trans('home.title'))

@section('main.content')
    {{ trans('home.content') }} {{ app()->getLocale() }}
@endsection
