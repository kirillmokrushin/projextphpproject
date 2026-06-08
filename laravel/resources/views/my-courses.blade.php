<!DOCTYPE html>
<html>
<head>
    <title>Мои курсы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4 text-center text-primary">Мои курсы</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($courses->count() > 0)
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <p class="card-text">
                                    <strong>Цена:</strong> 
                                    <span class="text-success">{{ number_format($course->price, 2) }} ₽</span>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="/courses/{{ $course->id }}" class="btn btn-primary btn-sm">Перейти к курсу</a>
                                    <form action="{{ route('courses.cancel', $course->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Отменить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">Вы ещё не записаны ни на один курс.</div>
        @endif
    </div>
</body>
</html>