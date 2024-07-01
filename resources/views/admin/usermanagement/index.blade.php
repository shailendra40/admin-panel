@extends('admin.layouts.master') <!-- Make sure this layout path is correct -->

@section('content')
<div class="container">
    <h1>User Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th> <!-- Add a column for Roles -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role) <!-- Assuming you have spatie/laravel-permission installed -->
                            <span class="badge badge-success">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.user-management.edit', $user->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.user-management.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
