@extends('layouts.front')

@section('content')

<!-- Page Header -->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">

            <h1 class="fw-bolder">

                @isset($keyword)

                    Search Results for "{{ $keyword }}"

                @elseif(isset($category))

                    {{ $category->name }}

                @else

                    Welcome to ZinBlog!

                @endisset

            </h1>


            <p class="lead mb-0">

                @isset($keyword)

                    Posts matching your search.

                @elseif(isset($category))

                    Posts from {{ $category->name }} category.

                @else

                    Discover the latest posts, stories and ideas.

                @endisset

            </p>

        </div>
    </div>
</header>



<!-- Page Content -->
<div class="container">

    <div class="row">


        <!-- Blog Entries -->
        <div class="col-lg-8">


            <!-- Featured Post -->
            @if(
                !isset($keyword) &&
                !isset($category) &&
                $posts->currentPage() == 1 &&
                $posts->count() > 0
            )

                @php
                    $featuredPost = $posts->first();
                @endphp


                <div class="card mb-4">

                    @if($featuredPost->image)

                        <img class="card-img-top"
                             src="{{ $featuredPost->image }}"
                             alt="{{ $featuredPost->title }}"
                             style="height:350px; object-fit:cover;">

                    @else

                        <img class="card-img-top"
                             src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                             alt="No Image">

                    @endif


                    <div class="card-body">

                        <div class="small text-muted mb-2">

                            {{ $featuredPost->created_at->format('F d, Y') }}

                            |

                            {{ $featuredPost->category->name }}

                            |

                            By {{ $featuredPost->user->name }}

                        </div>


                        <h2 class="card-title">
                            {{ $featuredPost->title }}
                        </h2>


                        <p class="card-text">
                            {{ $featuredPost->description }}
                        </p>


                        <a class="btn btn-primary"
                           href="{{ route('posts.show', $featuredPost->id) }}">

                            Read more →

                        </a>

                    </div>

                </div>

            @endif



            <!-- Regular Posts -->
            <div class="row">

                @forelse($posts as $post)

                    @if(
                        isset($keyword) ||
                        isset($category) ||
                        $posts->currentPage() != 1 ||
                        !$loop->first
                    )

                        <div class="col-lg-6">

                            <div class="card mb-4 h-100">

                                @if($post->image)

                                    <img class="card-img-top"
                                         src="{{ $post->image }}"
                                         alt="{{ $post->title }}"
                                         style="height:220px; object-fit:cover;">

                                @else

                                    <img class="card-img-top"
                                         src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                                         alt="No Image">

                                @endif


                                <div class="card-body d-flex flex-column">

                                    <div class="small text-muted mb-2">

                                        {{ $post->created_at->format('F d, Y') }}

                                        |

                                        {{ $post->category->name }}

                                        |

                                        By {{ $post->user->name }}

                                    </div>


                                    <h2 class="card-title h4">
                                        {{ $post->title }}
                                    </h2>


                                    <p class="card-text">
                                        {{ $post->description }}
                                    </p>


                                    <div class="mt-auto">

                                        <a class="btn btn-primary"
                                           href="{{ route('posts.show', $post->id) }}">

                                            Read more →

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif


                @empty

                    <div class="col-12">

                        <div class="alert alert-info">
                            No posts found.
                        </div>

                    </div>

                @endforelse

            </div>



            <!-- Pagination -->
            <div class="d-flex justify-content-center my-4">

                {{ $posts->withQueryString()->links() }}

            </div>


        </div>



        <!-- Side Widgets -->
        <div class="col-lg-4">


            <!-- Search -->
            <div class="card mb-4">

                <div class="card-header">
                    Search
                </div>


                <div class="card-body">

                    <form action="{{ route('search') }}"
                          method="GET">

                        <div class="input-group">

                            <input class="form-control"
                                   type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Enter search term..."
                                   required>


                            <button class="btn btn-primary"
                                    type="submit">

                                Go!

                            </button>

                        </div>

                    </form>

                </div>

            </div>



            <!-- Categories -->
            <div class="card mb-4">

                <div class="card-header">
                    Categories
                </div>


                <div class="card-body">

                    <div class="row">

                        @foreach($categories as $cat)

                            <div class="col-sm-6 mb-2">

                                <a href="{{ route('category.posts', $cat->id) }}"
                                   class="text-decoration-none">

                                    {{ $cat->name }}

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>



            <!-- About -->
            <div class="card mb-4">

                <div class="card-header">
                    About ZinBlog
                </div>


                <div class="card-body">

                    Welcome to ZinBlog. Read the latest posts,
                    stories and ideas from our writers.

                </div>

            </div>


        </div>

    </div>

</div>

@endsection