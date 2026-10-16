<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('front-asset/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front-asset/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>

    <div class="d-flex flex-column min-vh-100">

    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('index') }}">
                ZinBlog
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"
                id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

                    @guest

                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                            class="btn btn-outline-light px-4">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                            class="btn btn-primary px-4">
                                Register
                            </a>
                        </li>

                    @else

                        <li class="nav-item dropdown">

                            <a class="btn btn-outline-light dropdown-toggle px-4"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                @if(in_array(Auth::user()->role, ['admin', 'staff']))

                                    <li>
                                        <a class="dropdown-item"
                                        href="{{ route('admin.index') }}">
                                            Admin Panel
                                        </a>
                                    </li>

                                @endif

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form action="{{ route('logout') }}"
                                        method="POST">
                                        @csrf

                                        <button type="submit"
                                                class="dropdown-item">
                                            Logout
                                        </button>
                                    </form>
                                </li>

                            </ul>

                        </li>

                    @endguest

                </ul>

            </div>

        </div>
    </nav>

    
     <main class="flex-grow-1">
        @yield('content')
    </main>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front-asset/js/scripts.js')}}"></script>

</div>
    </body>
</html>
