@extends('layouts.app')

@section('content')
<h1>Task List</h1>
<a href="{{ route('tasks.create') }}">Create New Task</a>
@if(session('status'))
    <p>{{ session('status') }}</p>
@endif
<ul>
    @foreach($tasks as $task)
        <li>
            <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
