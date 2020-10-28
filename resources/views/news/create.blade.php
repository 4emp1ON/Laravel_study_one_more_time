@extends('layouts/template')

@section('title')
    Добавить новость
@endsection

@section('content')
    <form method="POST" action="{{ route('news.store') }}">
        @csrf
        <fieldset class="mt-3">
            <legend>Добавление новости</legend>
            <div class="form-group row">
                <label for="postTitle" class="col-sm-2 col-form-label">Заголовок новости</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="postTitle" name="title">
                </div>
                <label for="postText" class="col-sm-2 col-form-label">Текст новости</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control p-3 mt-3" id="postText" name="text">
                    </textarea>
                </div>
                <label for="postAuthor" class="col-sm-2 col-form-label">Автор новости</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mt-3" id="postAuthor" name="author">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Добавить новость</button>
        </fieldset>
    </form>
@endsection
