@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Görevler</h1>
        <a href="{{ url('/create') }}" class="btn btn-primary">Yeni Görev</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-bold text-dark">Başlık</th>
                            <th class="fw-bold text-dark">Açıklama</th>
                            <th class="fw-bold text-dark">Durum</th>
                            <th class="fw-bold text-dark">Atanan Kişi</th>
                            <th class="fw-bold text-dark" style="width: 200px;">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @php
                                        $statusClass = [
                                            'pending' => 'warning',
                                            'in_progress' => 'info',
                                            'completed' => 'success'
                                        ];
                                        $statusText = [
                                            'pending' => 'Beklemede',
                                            'in_progress' => 'Devam Ediyor',
                                            'completed' => 'Tamamlandı'
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $statusClass[$task->status] }}">
                                        {{ $statusText[$task->status] }}
                                    </span>
                                </td>
                                <td>{{ $task->user->name }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('/'.$task->id.'/edit') }}" class="btn btn-success btn-sm">
                                            Düzenle
                                        </a>
                                        <form action="{{ url('/'.$task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-1" onclick="return confirm('Silmek istediğinize emin misiniz?')">
                                                Sil
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Henüz görev bulunmamaktadır.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 