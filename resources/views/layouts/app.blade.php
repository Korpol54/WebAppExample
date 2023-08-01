<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('sweetalert::alert')
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container">
                <a href="" class="navbar-brand text-dark h2">WebBlogs</a>
                <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar" aria-controls="Navbar" aria-expended="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars fa-lg"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link text-dark active me-3" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Content.index') }}" class="nav-link text-dark me-3">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.edit') }}" class="nav-link text-dark me-4">Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"><i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="nav-link text-dark text-decoration-none" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <span><i class="fa-solid fa-right-from-bracket"></i></span>
                                    Sign Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- END ------------>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ee7af74b6d.js" crossorigin="anonymous"></script>

    </body>
</html>
