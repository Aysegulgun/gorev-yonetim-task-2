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
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        try {
            Task::create($validated);
            return redirect('/')->with('success', 'Görev başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Görev oluşturulurken bir hata oluştu.');
        }
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
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        try {
            $task->update($validated);
            return redirect('/')->with('success', 'Görev başarıyla güncellendi.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Görev güncellenirken bir hata oluştu.');
        }
    }

    // Görevi sil
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla silindi.');
    }
}
