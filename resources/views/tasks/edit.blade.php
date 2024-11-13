@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}" required>
    <label for="description">Description:</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>
    <button type="submit">Update Task</button>
</form>
@endsection
