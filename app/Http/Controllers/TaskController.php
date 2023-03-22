<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $tasks = $user->tasks;

    return view('tasks', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $user = Auth::user();
    $task = new Task($validatedData);
    $task->user_id = $user->id;
    $task->save();

    return redirect()->route('tasks')->with('success', 'Tarea agregada correctamente.');
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks');
}

}
