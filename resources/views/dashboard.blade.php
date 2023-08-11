<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- NAVBAR ------------------->
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

        <!-- CONTROL ------------------>
        <div class="container d-flex justify-content-end pt-5 pb-3">
            <a href="{{ route('Content.create') }}" class="btn btn-success">
                <span><i class="fa-solid fa-plus fa-sm me-2"></i></span>
                New Post
            </a>
        </div>
        <!-- END -->

        <!-- Section ------------------------------>
        @foreach ($content as $contents)
        <div class="container d-flex justify-content-center pt-3">
            <div class="card mb-3 bg-dark text-white card-content" style="width: 80%;">
                <img class="card-img-top" src="{{ asset('storeImg/'.$contents->image) }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $contents->name }}</h5>
                    <p class="card-text">{{ $contents->description }}</p>
                    <hr>
                    <p class="card-text text-end"><small class="text-muted">Create At : {{ $contents->created_at }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End ---------------------- -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ee7af74b6d.js" crossorigin="anonymous"></script>
</body>
</html>



