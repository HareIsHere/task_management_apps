@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Edit Task</h4>
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Back to Task List
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <!-- Form for editing a task -->
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                            <input type="text" name="title" id="title" value="{{ $task->title }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $task->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-700 font-medium mb-2">Due Date</label>
                            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-6 py-2">
                                Update Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
