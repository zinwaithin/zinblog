@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-3">
        <h1 class="mt-4 d-inline">Edit Post</h1>

        <a href="{{ route('admin.posts.index') }}"
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
            <a href="{{ route('admin.posts.index') }}">
                Posts
            </a>
        </li>

        <li class="breadcrumb-item active">
            Edit Post
        </li>

    </ol>


    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Post
        </div>

        <div class="card-body">

            <form action="{{ route('admin.posts.update', $post->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <!-- Title -->

                <div class="mb-3">

                    <label for="title"
                           class="form-label">
                        Title
                    </label>

                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           value="{{ $post->title }}">

                </div>


                <!-- Image -->

                <div class="mb-3">

                    <ul class="nav nav-tabs"
                        id="imageTab"
                        role="tablist">

                        <li class="nav-item"
                            role="presentation">

                            <button class="nav-link active"
                                    id="old-image-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#old-image-tab-pane"
                                    type="button"
                                    role="tab">

                                Image

                            </button>

                        </li>


                        <li class="nav-item"
                            role="presentation">

                            <button class="nav-link"
                                    id="new-image-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#new-image-tab-pane"
                                    type="button"
                                    role="tab">

                                New Image

                            </button>

                        </li>

                    </ul>


                    <div class="tab-content"
                         id="imageTabContent">


                        <!-- Old Image -->

                        <div class="tab-pane fade show active"
                             id="old-image-tab-pane"
                             role="tabpanel">

                            @if($post->image)

                                <img src="{{ $post->image }}"
                                     alt=""
                                     width="150"
                                     class="my-3 rounded">

                            @else

                                <p class="my-3">
                                    No Image
                                </p>

                            @endif


                            <input type="hidden"
                                   name="old_image"
                                   value="{{ $post->image }}">

                        </div>


                        <!-- New Image -->

                        <div class="tab-pane fade"
                             id="new-image-tab-pane"
                             role="tabpanel">

                            <input type="file"
                                   name="image"
                                   id="image"
                                   accept="image/*"
                                   class="form-control my-3">

                        </div>

                    </div>

                </div>


                <!-- Description -->

                <div class="mb-3">

                    <label for="description"
                           class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="3">{{ $post->description }}</textarea>

                </div>


                <!-- Content -->

                <div class="mb-3">

                    <label for="content"
                           class="form-label">
                        Content
                    </label>

                    <textarea name="content"
                              id="content"
                              class="form-control"
                              rows="6">{{ $post->content }}</textarea>

                </div>


                <!-- Category -->

                <div class="mb-3">

                    <label for="category_id"
                           class="form-label">
                        Category
                    </label>

                    <select name="category_id"
                            id="category_id"
                            class="form-select">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ $post->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- User -->

                <div class="mb-3">

                    <label for="user_id"
                           class="form-label">
                        User
                    </label>

                    <select name="user_id"
                            id="user_id"
                            class="form-select">

                        @foreach($users as $user)

                            <option value="{{ $user->id }}"
                                {{ $post->user_id == $user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Save -->

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