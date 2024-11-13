@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 rounded-lg shadow-md mb-4">
                    <div class="flex items-center">
                        <span class="font-semibold text-lg">{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Task List</h4>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Create New Task
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <!-- Table for displaying tasks -->
                    <table class="table-auto w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm font-light">
                            @foreach($tasks as $task)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">{{ $task->id }}</td>
                                    <td class="py-3 px-6 text-left">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">{{ $task->title }}</a>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
