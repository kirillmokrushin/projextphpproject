<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

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
                        
                        <!-- Форма отзыва -->
                        <div class="mt-4 p-3 border rounded">
                            <h5>Оставить отзыв</h5>
                            <form action="{{ route('courses.review', $course->id) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label>Оценка (1-5):</label>
                                    <select name="rating" class="form-control w-25" required>
                                        <option value="5">5 - Отлично</option>
                                        <option value="4">4 - Хорошо</option>
                                        <option value="3">3 - Средне</option>
                                        <option value="2">2 - Плохо</option>
                                        <option value="1">1 - Ужасно</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <textarea name="comment" class="form-control" rows="3" placeholder="Ваш отзыв..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Отправить отзыв</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="mt-3 d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">📝 Записаться на курс</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning mt-3">🔐 Войдите, чтобы записаться</a>
                @endauth

                <!-- Список отзывов -->
                <div class="mt-4">
                    <h5>Отзывы студентов</h5>
                    @if($course->reviews->count() > 0)
                        @foreach($course->reviews as $review)
                            <div class="border rounded p-3 mb-2">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $review->student->name ?? 'Пользователь' }}</strong>
                                    <span>Оценка: {{ $review->rating }} / 5</span>
                                </div>
                                <p class="mb-0 mt-2">{{ $review->comment }}</p>
                                <small class="text-muted">{{ $review->created_at->format('d.m.Y H:i') }}</small>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Пока нет отзывов. Будьте первым!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>