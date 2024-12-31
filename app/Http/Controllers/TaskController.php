<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::with('user')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create', [
            'users' => User::select('id', 'name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        Task::create($validated);

        return Inertia::render('Tasks/Index', [
            'tasks' => Task::with('user')->latest()->get(),
            'message' => 'Görev başarıyla oluşturuldu'
        ]);
    }

    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => $task,
            'users' => User::select('id', 'name')->get()
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $task->update($validated);

        return Inertia::render('Tasks/Index', [
            'tasks' => Task::with('user')->latest()->get(),
            'message' => 'Görev başarıyla güncellendi'
        ]);
    }

    public function destroy(Task $task)
    {
        try {
            $task->delete();
            
            return Inertia::render('Tasks/Index', [
                'tasks' => Task::with('user')->latest()->get(),
                'message' => 'Görev başarıyla silindi'
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Görev silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
