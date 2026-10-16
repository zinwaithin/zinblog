@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-4">

        <h1 class="d-inline">Create User</h1>

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
            Create User
        </li>

    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i>
            Create User
        </div>

        <div class="card-body">

            <form action="{{ route('admin.users.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label for="name"
                           class="form-label">
                        Name
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           value="{{ old('name') }}">

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
                           value="{{ old('email') }}"
                           autocomplete="off">

                </div>


                <div class="mb-3">

                    <label for="password"
                           class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           autocomplete="new-password">

                </div>


                <div class="mb-3">

                    <label for="role"
                           class="form-label">
                        Role
                    </label>

                    <select name="role"
                            id="role"
                            class="form-select">

                        <option value="">
                            Choose Role
                        </option>

                        <option value="admin">
                            Admin
                        </option>

                        <option value="staff">
                            Staff
                        </option>

                        <option value="user">
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