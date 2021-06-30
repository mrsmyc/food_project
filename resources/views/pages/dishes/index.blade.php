@extends('layouts.main')

@section('title', 'Блюда')

@section('content')
    <h1>Блюда</h1>
    <a class="btn btn-primary" href="/dishes/create" role="button">Добавить блюдо</a>
    <div class="d-flex flex-wrap justify-content-between">
        @foreach ($dishes as $dish)
            <div class="card mt-3" style="width: 18rem;">
                <img class="card-img-top" src="/photos/{{$dish->photo}}" alt="Card image cap">
                <div class="card-header">
                Название: {{$dish->name}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Срок годности: {{$dish->expiration_time}}</li>
                    <li class="list-group-item">Вес: {{$dish->weight}}</li>
                    <li class="list-group-item">Состав: 
                    @foreach ($dish->products as $key => $item)
                        <p>{{$item->name}} || {{$item->pivot->weight}} гр.</p>
                    @endforeach</li>          
                    @if ($dish->totalWeight != $dish->weight)
                        <li class="list-group-item text-danger">Общий вес: {{$dish->totalWeight}}</li>                    
                    @else
                        <li class="list-group-item">Общий вес: {{$dish->totalWeight}}</li>                                            
                    @endif          
                    <li class="list-group-item">Себестоимость: {{$dish->costPrice}}</li>
                    <li class="list-group-item">Калорийность: {{$dish->totalCalorieContent}}</li>
                    <li class="list-group-item">Белки: {{$dish->totalProtein}}</li>
                    <li class="list-group-item">Жиры: {{$dish->totalFat}}</li>
                    <li class="list-group-item">Углеводы: {{$dish->totalCarb}}</li>
                    <li class="list-group-item">Комментарий: {{$dish->comment}}</li>
                    <li class="list-group-item"><a href="/dishes/{{$dish->id}}/edit" class="btn btn-primary">Редактировать</a></li> 
                    <li class="list-group-item"><a href="/dishes/{{$dish->id}}/destroy" class="btn btn-primary">Удалить</a></li> 
                </ul>
            </div>
        @endforeach            
    </div>
    <div class="mt-3">
        {{ $dishes->links() }}
    </div>
@endsection
