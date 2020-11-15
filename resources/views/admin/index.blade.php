@extends('layouts/template')

@section('title')
    Admin: Новости
@endsection

@section('content')
    <div class="pt-3 d-flex justify-content-lg-between flex-wrap">
        @forelse ($news as $post)
            <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-header">{{ $post->author }}</div>
                <div class="card-body">
                    <a href="{{ route('news.show', $post->id) }}">
                        <h4 class="card-title">{{ ucfirst($post->title) }}</h4>
                    </a>
                    <p class="card-text">{{ ucfirst($post->body) }}</p>
                    <div class="btn-group">
                        <a href="{{ route('admin_news.edit', $post->id) }}">
                            <div class="btn btn-warning">Edit</div>
                        </a>
                        <form action="{{ route('admin_news.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-1">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-header">В Багдаде все спокойной</div>
                <div class="card-body">
                    <h4 class="card-title">Новостей нет</h4>
                    <p class="card-text">и не будет</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection
