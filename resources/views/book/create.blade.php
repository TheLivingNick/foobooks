{{-- /resources/views/book/create.blade.php --}}
@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')
    <h1>Add a new book</h1>

    <form method='POST' action='/book'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        @include('modules.error-field', ['fieldName' => 'title'])

        <label for='author'>* Author</label>
        <input type='text' name='author' id='author' value='{{ old('author') }}'>
        @include('modules.error-field', ['fieldName' => 'author'])

        <label for='publishedYear'>* Published Year (YYYY)</label>
        <input type='text' max='4' name='publishedYear' id='publishedYear' value='{{ old('publishedYear') }}'>
        @include('modules.error-field', ['fieldName' => 'publishedYear'])

        <input type='submit' value='Add book' class='btn btn-primary btn-small'>
    </form>

    @if(isset($title))
        <div class='confirmation success'>Your book {{ $title }} was added.</a>
    @endif
@endsection
