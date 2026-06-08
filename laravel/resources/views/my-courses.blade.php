@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Мои курсы</h1>

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
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <p class="card-text"><strong>Цена:</strong> {{ number_format($course->price, 2) }} ₽</p>
                            <a href="/courses/{{ $course->id }}" class="btn btn-primary btn-sm">Перейти к курсу</a>

                            <!-- Форма отмены записи -->
                            <form action="{{ route('courses.cancel', $course->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите отменить запись?')">Отменить запись</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Вы ещё не записаны ни на один курс.</div>
    @endif
</div>
@endsection