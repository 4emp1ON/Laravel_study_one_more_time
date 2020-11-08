@extends('layouts/template')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">{{ ucfirst($post->title) }}</h1>
        <p class="lead">{{ ucfirst($post->text) }}</p>
        <hr class="my-4">
        <p>Author: {{ $post->author }}</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}" role="button">Back</a>
        </p>
    </div>
@endsection
