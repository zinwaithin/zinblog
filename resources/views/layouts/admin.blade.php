<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>ZinBlog Admin Panel</title>


    <!-- Favicon -->
    <link rel="icon"
          type="image/x-icon"
          href="{{ asset('admin-asset/assets/favicon.ico') }}" />


    <!-- Core theme CSS -->
    <link href="{{ asset('admin-asset/css/styles.css') }}"
          rel="stylesheet" />


    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>


    <style>

        body {
            margin: 0;
            background-color: #f8f9fa;
        }


        /* ================= TOP NAVBAR ================= */

        .admin-topnav {
            height: 60px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }


        /* ================= SIDEBAR ================= */

        .admin-sidebar {
            width: 250px;
            height: calc(100vh - 60px);

            position: fixed;
            top: 60px;
            left: 0;

            background-color: #212529;

            overflow-y: auto;
        }


        .sidebar-heading {
            color: #6c757d;

            font-size: 12px;
            font-weight: bold;

            padding: 20px 20px 10px;

            text-transform: uppercase;
        }


        .admin-sidebar .nav-link {
            color: #adb5bd;

            padding: 12px 20px;
        }


        .admin-sidebar .nav-link:hover {
            color: #ffffff;

            background-color: #343a40;
        }


        .admin-sidebar .nav-link i {
            width: 25px;
        }


        /* ================= CONTENT ================= */

        .admin-content {
            margin-left: 250px;
            padding-top: 60px;

            min-height: 100vh;

            display: flex;
            flex-direction: column;
        }


        .admin-main {
            flex: 1;
        }


        /* ================= FOOTER ================= */

        .admin-footer {
            background-color: #ffffff;

            border-top: 1px solid #dee2e6;
        }


        /* ================= MOBILE ================= */

        @media (max-width: 768px) {

            .admin-sidebar {
                width: 200px;
            }

            .admin-content {
                margin-left: 200px;
            }

        }

    </style>

</head>


<body>


<!-- ================================================= -->
<!-- TOP NAVBAR -->
<!-- ================================================= -->

<nav class="navbar navbar-dark bg-dark admin-topnav">

    <div class="container-fluid">


        <!-- Brand -->

        <a class="navbar-brand"
           href="{{ route('admin.index') }}">

            <i class="fas fa-blog me-2"></i>

            ZinBlog Admin Panel

        </a>


        <!-- Right User Menu -->

        <div class="dropdown">

            <a class="nav-link dropdown-toggle text-white"
               href="#"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                <i class="fas fa-user-circle me-1"></i>

                Admin

            </a>


            <ul class="dropdown-menu dropdown-menu-end">


                <!-- View Website -->

                <li>

                    <a class="dropdown-item"
                       href="{{ route('index') }}">

                        <i class="fas fa-globe me-2"></i>

                        View Website

                    </a>

                </li>


                <li>
                    <hr class="dropdown-divider">
                </li>


                <!-- Logout -->
                <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="dropdown-item">

                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout

                    </button>
                </form>
            </li>
                
            </ul>

        </div>

    </div>

</nav>



<!-- ================================================= -->
<!-- SIDEBAR -->
<!-- ================================================= -->

<div class="admin-sidebar">


    <!-- CORE -->

    <div class="sidebar-heading">
        Core
    </div>


    <!-- Dashboard -->

    <a class="nav-link"
       href="{{ route('admin.index') }}">

        <i class="fas fa-tachometer-alt"></i>

        Dashboard

    </a>



    <!-- MANAGE -->

    <div class="sidebar-heading">
        Manage
    </div>


    <!-- Posts -->

    <a class="nav-link"
       href="{{ route('admin.posts.index') }}">

        <i class="fas fa-file-alt"></i>

        Posts

    </a>


    <!-- Categories -->
    <a class="nav-link" href="{{ route('admin.categories.index') }}">
    <i class="fas fa-list"></i>
    Categories
    </a>

    <!-- Users -->
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="fas fa-users"></i>
        Users
    </a>


    <!-- WEBSITE -->

    <div class="sidebar-heading">
        Website
    </div>


    <!-- View Website -->

    <a class="nav-link"
       href="{{ route('index') }}">

        <i class="fas fa-globe"></i>

        View Website

    </a>


</div>



<!-- ================================================= -->
<!-- MAIN CONTENT -->
<!-- ================================================= -->

<div class="admin-content">


    <main class="admin-main">

        @yield('content')

    </main>



    <!-- ================================================= -->
    <!-- FOOTER -->
    <!-- ================================================= -->

    <footer class="admin-footer py-3">

        <div class="container-fluid px-4">

            <div class="d-flex align-items-center justify-content-between small">


                <div class="text-muted">

                    Copyright &copy;
                    ZinBlog {{ date('Y') }}

                </div>


                <div class="text-muted">

                    Admin Panel

                </div>


            </div>

        </div>

    </footer>


</div>



<!-- ================================================= -->
<!-- JAVASCRIPT -->
<!-- ================================================= -->


<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Core theme JS -->

<script src="{{ asset('admin-asset/js/scripts.js') }}"></script>


</body>

</html>