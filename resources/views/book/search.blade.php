{{-- /resources/views/book/search.blade.php --}}
@extends('layouts.master')

@push('head')
    <link href='/css/book.css' rel='stylesheet'>
@endpush

@section('title')
    Search
@endsection

@section('content')
    <h1>Search</h1>

    <form method='GET' action='/search'>

        <div class='details'>* Required fields</div>

        <label for='searchTerm'>* Search by title:</label>
        <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}'>

        <input type='checkbox' name='caseSensitive' {{ ($caseSensitive) ? 'CHECKED' : ''}}>
        <label>case sensitive</label>

        <br>
        <input type='submit' class='btn btn-primary btn-small' value='Search'>

    </form>

    @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            @foreach($searchResults as $title => $book)
                <div class='book cf'>
                    <img src='{{ $book['cover'] }}' class='cover' alt='Cover image for {{ $title }}'>
                    <h2>{{ $title }}</h2>
                    <p>By {{ $book['author'] }}</p>
                    <a href='/book/{{ kebab_case($title) }}'>View</a>
                </div>
            @endforeach
        @endif
    @endif


@endsection
