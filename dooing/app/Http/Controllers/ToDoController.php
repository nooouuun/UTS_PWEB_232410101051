<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index(Request $request)
    {

        $tasks = session('tasks', []);
        return view('to-do-list', compact('tasks'));
        // $tasks = $request->session()->get('tasks', []);
        // return view('to-do-list', compact('tasks'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'category' => 'required|in:personal,team',
        ]);

        $tasks = $request->session()->get('tasks', []);

        $tasks[] = [
            'id' => uniqid(),
            'name' => $request->task,
            'completed' => false,
            'category' => $request->category,
        ];

        $request->session()->put('tasks', $tasks);
        return redirect()->route('todo.index');
    }


    public function toggle(Request $request, $id)
    {
        $tasks = $request->session()->get('tasks', []);
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                $task['completed'] = !$task['completed'];
                break;
            }
        }
        $request->session()->put('tasks', $tasks);
        return redirect()->route('todo.index');
    }


    public function delete(Request $request, $id)
{
    $tasks = $request->session()->get('tasks', []);
    $tasks = array_filter($tasks, fn($task) => $task['id'] != $id);
    $request->session()->put('tasks', array_values($tasks));
    return redirect()->route('todo.index');
}

}
