<!DOCTYPE html>
<html>
<head>
    <title>Курсы</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial; padding: 20px; }
        .course { border: 1px solid #ccc; margin-bottom: 15px; padding: 15px; border-radius: 5px; }
        .title { color: #007bff; }
        .btn { background: #007bff; color: white; padding: 8px 15px; text-decoration: none; display: inline-block; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Все курсы</h1>

    @foreach($courses as $course)
        <div class="course">
            <h2 class="title">{{ $course->title }}</h2>
            <p>{{ $course->description }}</p>
            <p><strong>Цена:</strong> {{ number_format($course->price, 2) }} ₽</p>
            <p><strong>Длительность:</strong> {{ $course->duration ?? 'не указана' }} ч.</p>
            <a href="/courses/{{ $course->id }}" class="btn">Подробнее</a>
        </div>
    @endforeach
</body>
</html>