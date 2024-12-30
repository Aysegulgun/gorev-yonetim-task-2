<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tüm görevleri listele
    public function index()
    {
        // Tüm görevleri tarihe göre sıralayarak getir
        $tasks = Task::with('user')->get();
                    
        return view('tasks.index', compact('tasks'));
    }

    // Yeni görev oluşturma formu
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    // Yeni görevi kaydet
    public function store(Request $request)
    {
        // Basit doğrulama
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        // Direkt olarak create kullan
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => $request->user_id
        ]);

        return redirect('/tasks');
    }

    // Görev düzenleme formu
    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    // Görevi güncelle
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla güncellendi.');
    }

    // Görevi sil
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla silindi.');
    }
}
