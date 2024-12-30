@extends('layouts.app')

@section('title', 'Görev Düzenle')

@section('content')
    <h1>Görev Düzenle</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Durum</label>
            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>Devam Ediyor</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Atanacak Kişi</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">İptal</a>
    </form>
@endsection 