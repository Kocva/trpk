@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Шкалы потребления питательных веществ</h1>
    
    <div class="mb-4" style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; width: 100%;">
            <h3 style="text-align: center">Калории ({{ $totalCalories }} из {{ $maxCalories }})</h3>
            <div role="progressbar" aria-valuenow="{{ $totalCalories }}" aria-valuemin="0" aria-valuemax="100" style="--value: {{ round(($totalCalories / $maxCalories) * 100) }}"></div>
        </div>

        <div style="flex: 1; width: 100%;">
            <h3 style="text-align: center">Белки ({{ $totalProtein }} из {{ $maxProtein }})</h3>
            <div role="progressbar" aria-valuenow="{{ $totalProtein }}" aria-valuemin="0" aria-valuemax="100" style="--value: {{ round(($totalProtein / $maxProtein) * 100) }}"></div>
        </div>

        <div style="flex: 1; width: 100%;">
            <h3 style="text-align: center">Жиры ({{ $totalFat }} из {{ $maxFat }})</h3>
            <div role="progressbar" aria-valuenow="{{ $totalFat }}" aria-valuemin="0" aria-valuemax="100" style="--value: {{ round(($totalFat / $maxFat) * 100) }}"></div>
        </div>

        <div style="flex: 1; width: 100%;">
            <h3 style="text-align: center">Углеводы ({{ $totalHydrate }} из {{ $maxHydrate }})</h3>
            <div role="progressbar" aria-valuenow="{{ $totalHydrate }}" aria-valuemin="0" aria-valuemax="100" style="--value: {{ round(($totalHydrate / $maxHydrate) * 100) }}"></div>
        </div>
    </div>
    <div class="list-group">
    @foreach($data as $food)
            @csrf
            <li class="list-group-item mb-3 rounded" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $food->foodName }}</h5>
                </div>
                <small>Энергетическая ценность:</small>
                <p class="mb-1">Калории: {{ $food->calories }}Ккал</p>
                <p class="mb-1">Белки: {{ $food->protein }}гр</p>
                <p class="mb-1">Жиры: {{ $food->fat }}гр</p>
                <p class="mb-1">Углеводы: {{ $food->hydrate }}гр</p>
            </li>
        @endforeach
    </div>
    <h1>Статистика веса</h1>
    <label for="weight">Вес (кг):</label><br>
                <input type="number" class="form-control" id="weight" name="weight"><br><br>
                <input type="submit" class="form-control" value="обновить вес">
    <div>
        <label for="period">Выберите период:</label>
        <select id="period">
            <option value="week">Неделя</option>
            <option value="month">Месяц</option>
        </select>
    </div>
    <div>
        <canvas id="weightChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const weightData = {
            labels: ["2024-04-01", "2024-04-02", "2024-04-03", "2024-04-04", "2024-04-05", "2024-04-06", "2024-04-07"],
            weights: [70, 70.5, 71, 70.8, 71.2, 70.9, 71.5]
        };

        const ctx = document.getElementById('weightChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: weightData.labels,
                datasets: [{
                    label: 'Вес',
                    data: weightData.weights,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        const periodSelect = document.getElementById('period');
        periodSelect.addEventListener('change', function() {
            const period = periodSelect.value;
            // Здесь можно обновить данные графика и его отображение в зависимости от выбранного периода
        });
    });
</script>
@endsection