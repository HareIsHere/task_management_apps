@extends('layouts.app')

@section('content')
<h1>{{ $task->title }}</h1>
<p>{{ $task->description }}</p>
<p>Status: {{ $task->is_completed ? 'Completed' : 'Incomplete' }}</p>
<a href="{{ route('tasks.edit', $task->id) }}">Edit Task</a>
<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Task</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Task List</a>
@endsection
