@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-3">
        <h1 class="mt-4 d-inline">Create Post</h1>

        <a href="{{ route('admin.posts.index') }}"
           class="btn btn-danger float-end">
            Back
        </a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('admin.posts.index') }}">Posts</a>
        </li>

        <li class="breadcrumb-item active">Create Post</li>
    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Post
        </div>

        <div class="card-body">

            <form action="{{ route('admin.posts.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>

                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>

                    <input type="file"
                           name="image"
                           id="image"
                           accept="image/*"
                           class="form-control">
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>

                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="3">{{ old('description') }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>

                    <textarea name="content"
                              id="content"
                              class="form-control"
                              rows="6">{{ old('content') }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>

                    <select name="category_id"
                            id="category_id"
                            class="form-select">

                        <option value="">Choose Category</option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>
                </div>


                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>

                    <select name="user_id"
                            id="user_id"
                            class="form-select">

                        <option value="">Choose User</option>

                        @foreach($users as $user)

                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>

                        @endforeach

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