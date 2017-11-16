@extends('layouts.master')

@push('head')
    <link href='/css/book.css' rel='stylesheet'>
@endpush

@section('title')
    All books
@endsection

@section('content')

    <h1>All books</h1>

    @foreach($books as $title => $book)
        <div class='book cf'>
            <img src='{{ $book['cover'] }}' class='cover' alt='Cover image for {{ $title }}'>
            <h2>{{ $title }}</h2>
            <p>By {{ $book['author'] }}</p>
            <a href='/book/{{ kebab_case($title) }}'>View</a>
        </div>
    @endforeach

@endsection
