@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 rounded-lg shadow-md mb-4">
                <div class="flex items-center">
                    <span class="font-semibold text-lg">{{ session('status') }}</span>
                </div>
            </div>
            @endif
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-700">Role</h4>
                    <a href="{{ url('roles/create') }}" class="btn btn-primary text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2">
                        Add Role
                    </a>
                </div>
                <div class="card-body p-6 bg-gray-50">
                    <!-- Place your table or list here to display the permissions -->
                    <table class="table-auto w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Role Name</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm font-light">
                            @foreach ($roles as $role)
                            {{-- @dd($permission) --}}
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $role->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $role->name }}</td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="text-blue-500 hover:underline">Add / Edit Role Permission</a> |
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="text-green-200 hover:underline">Edit</a> |
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="text-red-500 hover:underline">Delete</a>
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
