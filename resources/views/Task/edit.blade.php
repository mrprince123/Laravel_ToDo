@extends('Layout.app')

@section('title', 'Edit Tasks')

@section('content')

    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mb-6">Edit Task</h2>

        {{-- Fetch the Value and show here --}}
        <form action="{{ route('task.update', $task->id) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Task Status -->
            <div class="mb-4">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="1" {{ $task->status ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ !$task->status ? 'selected' : '' }}>Not Completed</option>
                </select>
            </div>

            <!-- Task Title -->
            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                    Title</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $task->title }}" required>
            </div>

            <!-- Task Description -->
            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                    Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>{{ $task->description }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mt-6">
                <button type="submit"
                    class="w-full sm:w-auto px-5 py-2.5 text-white bg-black hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700 transition-all">
                    Update
                </button>

                <button type="reset"
                    class="w-full sm:w-auto px-5 py-2.5 text-gray-900 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-center dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 transition-all">
                    Reset
                </button>
            </div>

        </form>
    </div>

@endsection
