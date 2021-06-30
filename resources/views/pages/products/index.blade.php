@extends('layouts.main')

@section('title', 'Продукты')

@section('content')
    <h1>Продукты</h1>
    <a class="btn btn-primary" href="/products/import" role="button">Импорт продуктов</a>
    <div class="d-flex flex-wrap justify-content-between">
        @foreach ($products as $product)
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-header">
                {{$product->name}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Калорийность: {{$product->calorie_content}}</li>
                    <li class="list-group-item">Белок: {{$product->protein}}</li>
                    <li class="list-group-item">Жиры: {{$product->fat}}</li>
                    <li class="list-group-item">Углеводы: {{$product->carb}}</li>
                    <li class="list-group-item">Цена: {{$product->price}}</li>
                    <li class="list-group-item"><a href="/products/{{$product->id}}/destroy" class="btn btn-primary">Удалить</a></li>
                </ul>
            </div>
        @endforeach            
    </div>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
