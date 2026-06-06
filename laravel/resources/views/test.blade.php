<!DOCTYPE html>
<html>
<head>
    <title>Тест курсов</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial; padding: 20px; }
        .course { border: 1px solid #ccc; margin-bottom: 15px; padding: 15px; border-radius: 5px; }
        .title { color: #007bff; }
    </style>
</head>
<body>
    <h1>Список курсов (тестовая страница)</h1>

    @if(count($courses) > 0)
        @foreach($courses as $course)
            <div class="course">
                <h2 class="title">{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <p><strong>Цена:</strong> {{ number_format($course->price, 2) }} ₽</p>
                <p><strong>Длительность:</strong> {{ $course->duration ?? 'не указана' }} ч.</p>
            </div>
        @endforeach
    @else
        <p>Нет курсов в базе данных.</p>
    @endif
</body>
</html>