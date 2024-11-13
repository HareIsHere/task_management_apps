@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Edit User</h4>
                    <a href="{{ url('users') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Back
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <form action="{{ url('users/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Your Name">
                        </div><div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Email</label>
                            <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Your Email">
                        </div><div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Password</label>
                            <input type="text" name="password" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Your Password">
                        </div><div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected':'' }}>{{ $role }}</option>
                                @endforeach
                            </select>
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
