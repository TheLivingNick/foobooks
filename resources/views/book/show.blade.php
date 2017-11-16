@extends('layouts.master')


@section('title')
    Show book
@endsection


@section('content')
    @if($title)
        <h1>{{ $title }}</h1>
    @else
        <h1>No book chosen</h1>
    @endif
@endsection
