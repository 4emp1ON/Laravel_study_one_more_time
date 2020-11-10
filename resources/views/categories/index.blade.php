@extends('layouts/template')

@section('title')
    Категории
@endsection

@section('content')
    <div class="pt-3 flex-column">
        <h1>Категории новостей</h1>
        @forelse ($categories as $category)
            <div class="card mb-3" style="max-width: 20rem;">
                <a href="{{ route('category.show', $category->id) }}">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ ucfirst($category->name) }}
                        <div class="btn-group">
                            <a href="{{ route('category.edit', $category->id) }}">
                                <div class="btn btn-warning">Edit</div>
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-1">DELETE</button>
                            </form>
                        </div>
                    </div>
                </a>

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
