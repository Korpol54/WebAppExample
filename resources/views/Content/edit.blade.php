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

    <h3 class="text-center pt-5 pb-5" >Edit Content</h3>

        <div class="container">
        <form action="{{ route('contents.update', $contents->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="formControl" class="form-label">Title</label>
            <input
                type="text"
                name="name"
                class="form-control"
                id="formControl"
                value="{{ $contents->name }}"
            >

            <label for="formControl" class="form-label">Description</label>
            <input
                type="text"
                name="description"
                class="form-control"
                id="formControl"
                value="{{ $contents->description }}"
            >
            <label for="formControl" class="form-label">Image</label>
            <div class="input-group">
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    id="formControl2"
                >
                <label class="input-group-text" for="formControl2">Upload</label>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <img src="{{ asset('/storeImg/'.$contents->image) }}" alt="" width="250" height="auto">
                </div>
            </div>
            <div class="container d-flex justify-content-end pt-3">
                <input type="submit" class="btn btn-primary me-2" value="Update">
                <a href="{{ route('Content.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>



        <!-- <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $contents->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $contents->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary bg-primary">Update</button> -->
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ee7af74b6d.js" crossorigin="anonymous"></script>
</body>
</html>

