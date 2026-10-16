@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-4">

        <h1 class="d-inline">Users</h1>

        <a href="{{ route('admin.users.create') }}"
           class="btn btn-primary float-end">

            <i class="fas fa-plus me-1"></i>
            Create User

        </a>

    </div>

    <ol class="breadcrumb mb-4">

        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">
                Dashboard
            </a>
        </li>

        <li class="breadcrumb-item active">
            Users
        </li>

    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Users List
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->role }}</td>

                        <td>

                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>
                                Edit

                            </a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>
                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection