@extends('layouts/template')

@section('title')
    Редактирование категории
@endsection

@section('content')
    <form method="POST" action="{{ route('category.update', $category->id) }}">
        @method('PUT')
        @csrf
        <fieldset class="mt-3">
            <legend>Редактирование категории</legend>
            <div class="form-group row">
                <label for="categoryName" class="col-sm-2 col-form-label">Название категории</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="categoryName" name="name" value="{{ $category->name }}">
                </div>
                <label for="categoryDescription" class="col-sm-2 col-form-label">Описание категории</label>
                <div class="col-sm-10">
<textarea type="text" class="form-control p-3 mt-3" id="categoryDescription" name="description">{{ $category->description }}</textarea>
                </div>
                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mt-3" id="slug" name="slug" value="{{ $category->slug }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить изменения</button>
        </fieldset>
    </form>
@endsection
