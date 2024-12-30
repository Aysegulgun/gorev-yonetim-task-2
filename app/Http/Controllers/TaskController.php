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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla oluşturuldu.');
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
