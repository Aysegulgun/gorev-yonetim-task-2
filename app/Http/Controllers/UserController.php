<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return Inertia::render('Users/Index', [
            'users' => User::latest()->get(),
            'message' => 'Kullanıcı başarıyla oluşturuldu'
        ]);
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return Inertia::render('Users/Index', [
            'users' => User::latest()->get(),
            'message' => 'Kullanıcı başarıyla güncellendi'
        ]);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return Inertia::render('Users/Index', [
                'users' => User::latest()->get(),
                'message' => 'Kullanıcı başarıyla silindi'
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Kullanıcı silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }
} 