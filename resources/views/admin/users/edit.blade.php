@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-4">

        <h1 class="d-inline">Edit User</h1>

        <a href="{{ route('admin.users.index') }}"
           class="btn btn-danger float-end">
            Back
        </a>

    </div>

    <ol class="breadcrumb mb-4">

        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">
                Dashboard
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('admin.users.index') }}">
                Users
            </a>
        </li>

        <li class="breadcrumb-item active">
            Edit User
        </li>

    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-user-edit me-1"></i>
            Edit User
        </div>

        <div class="card-body">

            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label for="name"
                           class="form-label">
                        Name
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           value="{{ $user->name }}">

                </div>


                <div class="mb-3">

                    <label for="email"
                           class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ $user->email }}"
                           autocomplete="off">

                </div>


                <div class="mb-3">

                    <label for="password"
                           class="form-label">
                        New Password
                    </label>

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           autocomplete="new-password">

                    <small class="text-muted">
                        Leave blank if you don't want to change password.
                    </small>

                </div>


                <div class="mb-3">

                    <label for="role"
                           class="form-label">
                        Role
                    </label>

                    <select name="role"
                            id="role"
                            class="form-select">

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="staff"
                            {{ $user->role == 'staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                        <option value="user"
                            {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                    </select>

                </div>


                <div class="d-grid gap-2">

                    <button type="submit"
                            class="btn btn-primary">

                        Save

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection