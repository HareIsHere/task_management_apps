@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Task Details</h4>
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Back to Task List
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <!-- Display task details -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $task->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $task->description }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-700 font-medium">Due Date: 
                            <span class="text-gray-800">{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'Not set' }}</span>
                        </p>
                    </div>
                
                    <div class="mb-4">
                        <p class="text-gray-700 font-medium">Status: 
                            <span class="{{ $task->status == 'completed' ? 'text-green-600' : ($task->status == 'in-progress' ? 'text-yellow-500' : 'text-red-600') }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </p>
                    </div>

                    <div class="flex space-x-4 mt-6">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                            Edit Task
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white bg-red-500 hover:bg-red-600 rounded-lg px-4 py-2">
                                Delete Task
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
