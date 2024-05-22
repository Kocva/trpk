@extends('layouts.app')
@csrf
@section('content')
<div class="container">
    <div style="display: flex;">
        <div style="flex: 1;">
            <h1>Мой профиль</h1>
            <form method="post" action="{{ url('/user-profile') }}">
                @csrf
                <label for="name" style="font-size: 17pt">Добрый день, {{ Auth::user()->name }} !</label><br>
                
                <label for="weight">Вес (кг):</label><br>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $userInfo->weight }}" required><br><br>
                
                <label for="height">Рост (см):</label><br>
                <input type="number" class="form-control" id="height" name="height" value="{{ $userInfo->height }}" required><br><br>
                
                <label for="gender">Пол:</label><br>
                <select id="gender" class="form-control" name="gender">
                    @if ($userInfo->gender == 'male')
                        <option value="male" selected>Мужской</option>
                        <option value="female">Женский</option>
                        @else
                        <option value="male">Мужской</option>
                        <option value="female" selected>Женский</option>
                    @endif
                </select><br><br>
                
                <label for="age">Возраст:</label><br>
                <input type="number" class="form-control" id="age" name="age" value="{{ $userInfo->age }}" required><br><br>
                

                <label for="activity">Ваша активность:</label><br>
                <select id="activity" class="form-control" name="activity">
                    <option value="minimal">Минимальная активность</option>
                    <option value="small">Слабая активность</option>
                    <option value="medium" selected>средняя активность</option>
                    <option value="high">Высокая активность</option>
                    <option value="extra">Экстра-активность</option>
                </select><br><br>


                <input type="submit" class="form-control" value="Сохранить">
            </form>
        </div>
    </div>
</div>
@endsection