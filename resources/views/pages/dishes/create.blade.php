@extends('layouts.main')

@section('title', 'Добавить блюдо')

@section('content')
    <h1>Добавить блюдо</h1>
    <form action="/dishes/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Название</label>
            <input name="name" type="text" class="form-control" placeholder="Название">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Фото</label>
            <input name="photo" type="file" class="form-control" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Срок годности (кол-во часов)</label>
            <input name="expiration_time" type="number" class="form-control" />            
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Вес</label>
            <input name="weight" type="number" class="form-control" />            
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Комментарий</label>
            <textarea class="form-control" name="comment" rows="3"></textarea>
          </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>

          <table>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <input {{ $product->value ? 'checked' : null }} data-id="{{ $product->id }}" type="checkbox" class="product-enable">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td><input value="{{ $product->value ?? null }}" {{ $product->value ? null : 'disabled' }} data-id="{{ $product->id }}" name="products[{{ $product->id }}]" type="number" class="product-weight form-control" placeholder="Вес"></td>
                </tr>
            @endforeach
          </table>          
        </form>
    </div>
    <script>
        $('document').ready(function () {
            $('.product-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.product-weight[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.product-weight[data-id="' + id + '"]').val(null)
            })
        });
    </script>
@endsection
