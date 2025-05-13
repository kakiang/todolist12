<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tasks = Task::paginate(7);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->save();
        return redirect()->route('tasks.index')->with('message', 'La tâche a bien été créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500'
        ]);
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->state = $request->has('state');
        $task->save();
        return redirect()->route('tasks.index')->with('message', 'La tâche a bien été modifiée !');
        // return back()->with('message', "La tâche a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse {
        $task->delete();
        return redirect()->route('tasks.index')->with('message', 'La tâche a bien été supprimé !');;
    }
}
