@extends('layouts/template')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="jumbotron">

        <h1 class="display-3">{{ ucfirst($post->title) }}</h1>
        <p class="lead">{{ ucfirst($post->body) }}</p>
        <h3>Новость относится к категориям:</h3>
        <div class="d-flex">
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->id) }}"><p class="ml-2">{{ucfirst($category->name)}}</p></a>
            @endforeach
        </div>
        <hr class="my-4">
        <p>Автор: {{ $post->author }}</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}" role="button">Back</a>
        </p>
    </div>
@endsection
