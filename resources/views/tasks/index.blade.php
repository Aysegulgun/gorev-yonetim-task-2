@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Görevler</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Yeni Görev</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="fw-bold text-dark">Başlık</th>
                    <th class="fw-bold text-dark">Açıklama</th>
                    <th class="fw-bold text-dark">Durum</th>
                    <th class="fw-bold text-dark">Atanan Kişi</th>
                    <th class="fw-bold text-dark">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->user->name ?? 'Atanmamış' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-success btn-sm">Düzenle</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Henüz görev bulunmuyor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 