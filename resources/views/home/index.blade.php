@extends('layouts.main')

@section('main.title', 'Главная')

@section('main.content')
    Текущий язык: {{ app()->getLocale() }}
@endsection
