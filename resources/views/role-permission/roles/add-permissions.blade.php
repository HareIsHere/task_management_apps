<!-- resources/views/role_permission/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Role : {{ $role->name }} </h4>
                    <a href="{{ url('roles') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Back
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="name" class="block text-gray-700 font-medium">Permissions</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <label for="">
                                        <input type="checkbox" name="permission[]"
                                        value="{{ $permission->name }}" 
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4 text-right">
                            <button type="submit" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-6 py-2">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
