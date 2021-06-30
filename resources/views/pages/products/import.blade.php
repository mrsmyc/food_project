@extends('layouts.main')

@section('title', 'Импорт продуктов')

@section('content')
    <h1>Загрузите файл</h1>
    <form action="/products/import" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="customFile">Xlsx файл</label>
        <input name="file" type="file" class="form-control" id="customFile"/>
        <button type="submit" class="btn btn-primary mt-3">Загрузить</button>
    </form>
@endsection
