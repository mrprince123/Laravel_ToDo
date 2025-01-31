@extends('Layout.app')

@section('title', 'Home')

@section('content')

    <div class="max-w-4xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">

        <!-- Add New Task Button -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('task.create') }}"
                class="bg-black hover:bg-gray-700 text-white font-medium py-2 px-5 rounded-lg shadow-md transition-all">
                + Add New Task
            </a>
        </div>

        <!-- Task List -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

            @forelse ($tasks as $item)
                <div
                    class="bg-white {{ $item->status == 1 ? 'opacity-70 cursor-not-allowed' : '' }} dark:bg-gray-800 p-4 rounded-lg border border-gray-200 shadow-md flex flex-col h-full">

                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $item->title }}</h3>

                            {{-- When Tick make the status true --}}
                            <form action="{{ route('task.update', $item->id) }}" method="POST"
                                id="task-form-{{ $item->id }}">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center gap-2">
                                    <label for="status">Completed</label>
                                    <input type="checkbox" name="status" value="1"
                                        {{ $item->status ? 'checked' : '' }} onchange="submitForm({{ $item->id }})">
                                </div>
                            </form>

                        </div>
                        <p class="text-sm text-gray-500 mb-2">Updated on:
                            {{ $item->updated_at->format('d M Y, h:i A') }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $item->description }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-auto flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 justify-end">
                        <a href="/task/{{ $item->id }}/edit"
                            class="bg-black hover:bg-gray-600 text-white font-medium py-1 px-4 rounded-md transition-all text-center {{ $item->status == 1 ? 'cursor-not-allowed opacity-50' : '' }}">
                            Update
                        </a>

                        <!-- Delete Button (Form) -->
                        <form action="{{ route('task.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-gray-200 hover:bg-gray-400 text-black font-medium py-1 px-4 rounded-md transition-all w-full sm:w-auto {{ $item->status == 1 ? 'cursor-not-allowed opacity-50' : '' }}">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-600 dark:text-gray-400 text-lg font-medium">
                    No Tasks Found! 🚀 Start by adding a new task.
                </div>
            @endforelse

        </div>

    </div>

@endsection
