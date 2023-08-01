<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/ee7af74b6d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <!-- Navbar ------------------>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container">
                <a href="" class="navbar-brand text-dark">WebBlogs</a>
                <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar" aria-controls="Navbar" aria-expended="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars fa-lg"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-dark me-2">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link text-dark">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End ------------------------>

        <!-- Section ------------------------------>
        <h3 class="text-center pt-5 pb-2">Content</h3>
        @foreach ($content as $contents)
        <div class="container d-flex justify-content-center pt-3">
            <div class="card mb-3 bg-dark text-white card-content" style="width: 80%;">
                <img class="card-img-top" src="{{ asset('storeImg/'.$contents->image) }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $contents->name }}</h5>
                    <p class="card-text">{{ $contents->description }}</p>
                    <hr>
                    <p class="card-text text-end"><small class="text-muted">Last Updated : {{ $contents->updated_at }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End ---------------------- -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
