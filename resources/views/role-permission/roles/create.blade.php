@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Create Role</h4>
                    <a href="{{ url('roles') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Back
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <form action="{{ url('roles') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Role Name</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Role name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 text-right">
                            <button type="submit" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-6 py-2">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
