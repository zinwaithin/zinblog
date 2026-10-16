@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-4">
        <h1 class="d-inline">Create Category</h1>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-danger float-end">
            Back
        </a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories.index') }}">Categories</a>
        </li>

        <li class="breadcrumb-item active">
            Create Category
        </li>
    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-list me-1"></i>
            Create Category
        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}"
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