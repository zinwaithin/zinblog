@extends('layouts.front')

@section('content')

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <article>

                <h1 class="fw-bolder mb-3">
                    {{ $post->title }}
                </h1>

                <div class="text-muted mb-3">
                    {{ $post->created_at->format('F d, Y') }}
                    |
                    {{ $post->category->name }}
                    |
                    By {{ $post->user->name }}
                </div>

                @if($post->image)

                    <img src="{{ $post->image }}"
                         alt="{{ $post->title }}"
                         class="img-fluid rounded mb-4 w-100"
                         style="max-height: 500px; object-fit: cover;">

                @endif

                <p class="lead">
                    {{ $post->description }}
                </p>

                <hr>

                <div class="fs-5">
                    {!! nl2br(e($post->content)) !!}
                </div>

            </article>

            <div class="mt-4">

                <a href="{{ route('index') }}"
                   class="btn btn-secondary">
                    ← Back to Blog
                </a>

            </div>

        </div>

    </div>

</div>

@endsection