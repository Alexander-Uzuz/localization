@extends('layouts.main')

@section('main.title', trans('placeholders.title'))

@section('main.content')
    {{ trans('placeholders.example', [
        'amount' => '5%',
        'date' => now()->translatedFormat('j F Y'),
    ]) }}
@endsection
