@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Добавление еды</h1>


    <h2>Ручное добавление</h2>
    <label for="weight">Вес (гр):</label><br>
    <input type="number" class="form-control" id="weight" name="weight" value=""><br><br>

    <label for="weight">Белки (гр):</label><br>
    <input type="number" class="form-control" id="weight" name="weight" value=""><br><br>

    <label for="weight">Жиры (гр):</label><br>
    <input type="number" class="form-control" id="weight" name="weight" value=""><br><br>

    <label for="weight">Углеводы (гр):</label><br>
    <input type="number" class="form-control" id="weight" name="weight" value=""><br><br>

    <input type="submit" class="form-control" value="Добавить"><br><br>


    <h2>Выбор из списка</h2>
    <form action="{{ route('addFood.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Поиск по названию еды">
            <button type="submit" class="btn btn-primary">Найти</button>
        </div>
    </form>
    <div class="list-group">
        @foreach($foodList as $food)
            <form action="{{ route('addFood.add', ['food' => $food]) }}" method="POST">
                @csrf
                <li class="list-group-item mb-3 rounded" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $food->foodName }}</h5>
                        <small class="text-muted">
                            <input type="number" name="grams" class="form-control mb-3" placeholder="Граммы" required>
                            <button type="submit" class="btn btn-primary ">добавить</button>
                        </small>
                    </div>
                    <small>Энергетическая ценность на 100 гр:</small>
                    <p class="mb-1">Калории: {{ $food->calories }}Ккал</p>
                    <p class="mb-1">Белки: {{ $food->protein }}гр</p>
                    <p class="mb-1">Жиры: {{ $food->fat }}гр</p>
                    <p class="mb-1">Углеводы: {{ $food->hydrate }}гр</p>
                </li>
            </form>
        @endforeach
    </div>
</div>
@endsection