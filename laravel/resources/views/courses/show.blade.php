<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>{{ $course->title }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Описание:</strong> {{ $course->description }}</p>
                <p><strong>Цена:</strong> {{ number_format($course->price, 2) }} ₽</p>
                <p><strong>Длительность:</strong> {{ $course->duration ?? 'не указана' }} ч.</p>
                
                <a href="/courses" class="btn btn-secondary">← Назад к списку</a>

                @auth
                    @php
                        $enrolled = App\Models\Enrollment::where('student_id', auth()->id())
                                    ->where('course_id', $course->id)
                                    ->exists();
                    @endphp
                    
                    @if($enrolled)
                        <div class="alert alert-success mt-3">✅ Вы записаны на этот курс</div>
                    @else
                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="mt-3 d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">📝 Записаться на курс</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning mt-3">🔐 Войдите, чтобы записаться</a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>