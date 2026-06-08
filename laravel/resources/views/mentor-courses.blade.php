@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Мои курсы (ментор)</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($courses->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Записей</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ number_format($course->price, 2) }} ₽</td>
                    <td>{{ $course->enrollments->count() }}</td>
                    <td>
                        <a href="/courses/{{ $course->id }}" class="btn btn-sm btn-info">Просмотр</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">У вас ещё нет созданных курсов.</div>
    @endif
</div>
@endsection
