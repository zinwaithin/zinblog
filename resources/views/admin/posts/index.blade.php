@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-3">
        <h1 class="mt-4 d-inline">Posts</h1>

        <a href="{{ route('admin.posts.create') }}"
           class="btn btn-primary float-end">
            Create Post
        </a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Posts</li>
    </ol>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Posts List
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($posts as $post)

                    <tr>
                        <td>{{ $post->id }}</td>

                        <td>{{ $post->title }}</td>

                        <td>
                            @if($post->image)
                                <img src="{{ $post->image }}"
                                     width="80">
                            @endif
                        </td>

                        <td>{{ $post->category->name }}</td>

                        <td>{{ $post->user->name }}</td>

                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.posts.destroy', $post->id) }}"
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

            {{ $posts->links() }}

        </div>

    </div>

</div>

@endsection