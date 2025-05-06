@extends('layouts.app')

@section('content')
<main class="max-w-6xl mx-auto mt-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Today's Tasks</h2>

    <form class="flex flex-col sm:flex-row sm:items-center gap-2 mb-8" method="POST" action="{{ route('todo.add') }}">
        @csrf
        <input type="text" name="task" class="flex-grow border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add new task..." required>

        <select name="category" required class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" disabled selected>Select category</option>
            <option value="personal">Personal</option>
            <option value="team">Team</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">Add</button>
    </form>

    <div class="flex flex-col md:flex-row md:items-start gap-6">
        <div class="w-full md:w-1/2 bg-white rounded-2xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Tasks</h3>
            <ul class="space-y-4">
                @forelse(array_filter($tasks, fn($t) => isset($t['category']) && $t['category'] === 'personal') as $task)
                <li class="flex items-center justify-between bg-gray-100 rounded-xl px-4 py-3">
                    <div class="flex items-center gap-3">
                        <form method="POST" action="{{ route('todo.toggle', $task['id']) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="h-5 w-5 rounded-full border-2 {{ $task['completed'] ? 'bg-blue-500 border-blue-500' : 'border-gray-400' }}"></button>
                        </form>
                        <span class="{{ $task['completed'] ? 'line-through text-gray-500' : 'text-gray-800' }}">
                            {{ $task['name'] }}
                        </span>
                    </div>
                    <form method="POST" action="{{ route('todo.delete', $task['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700">&times;</button>
                    </form>
                </li>
                @empty
                <li class="text-gray-500">No personal tasks.</li>
                @endforelse
            </ul>
        </div>

        <div class="w-full md:w-1/2 bg-white rounded-2xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Team Tasks</h3>
            <ul class="space-y-4">
                @forelse(array_filter($tasks, fn($t) => isset($t['category']) && $t['category'] === 'team') as $task)
                <li class="flex items-center justify-between bg-gray-100 rounded-xl px-4 py-3">
                    <div class="flex items-center gap-3">

                        <form method="POST" action="{{ route('todo.toggle', $task['id']) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="h-5 w-5 rounded-full border-2 {{ $task['completed'] ? 'bg-blue-500 border-blue-500' : 'border-gray-400' }}"></button>
                        </form>
                        <span class="{{ $task['completed'] ? 'line-through text-gray-500' : 'text-gray-800' }}">
                            {{ $task['name'] }}
                        </span>
                    </div>
                    <form method="POST" action="{{ route('todo.delete', $task['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700">&times;</button>
                    </form>
                </li>
                @empty
                <li class="text-gray-500">No team tasks.</li>
                @endforelse
            </ul>
        </div>
    </div>
</main>
@endsection
