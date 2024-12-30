@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Görevi Düzenle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/'.$task->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Durum</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>Devam Ediyor</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Atanacak Kişi</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">İptal</a>
    </form>
</div>
@endsection 