<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Marketplace</title>
</head>

<body class="d-flex flex-column vh-100">
    {{-- Begin of Navbar --}}
    <nav class="d-flex flex-column navbar navbar-expand-lg border-bottom fixed-top p-0 bg-white shadow">
        <div
            class="information-header text-center text-white normal-weight w-100 {{ request()->is('/') ? '' : 'd-none' }}">
            <h6 class="m-0 p-2 normal-weight">Anda mahasiswa yang hendak berjualan di platform kami? Klik <a
                    href="" class="text-decoration-none bold-weight secondary">Disini</a></h6>
        </div>
        <div class="container-fluid py-4">
            <a class="navbar-brand mx-4 bold-weight primary" href="#">Shoplinep</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-1">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" aria-current="page"
                            href="/products">Our Products</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About Us</a>
                    </li>
                </ul>
                @guest
                    <ul class="navbar-nav ml-auto normal-weight">
                        <li class="nav-item mx-1">
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <small>{{ auth()->user()->name }}</small>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="btn btn-danger mx-2 shadow"
                                    onclick="document.getElementById('logout').submit();">Keluar</a>
                                @csrf
                            </form>
                        @endauth
                    </ul>
                @endguest

            </div>
        </div>
    </nav>
    {{-- End of Navbar --}}

    {{-- Begin of Content --}}
    <div class="container-fluid p-0">
        @yield('content')
    </div>
    {{-- End of Content --}}

    {{-- Begin of Footer --}}
    <footer class="mt-auto bg-dark p-4">
        <h4 class="text-center text-white bold-weight text-white">Copyright - Kelompok 5</h4>
    </footer>
    {{-- End of Footer --}}
    <script>
        const categoryCardList = document.querySelector('.category-card-list');
        let isMouseDown = false;
        let startX;
        let scrollLeft;

        categoryCardList.addEventListener('mousedown', (e) => {
            isMouseDown = true;
            startX = e.pageX - categoryCardList.offsetLeft;
            scrollLeft = categoryCardList.scrollLeft;
        });

        categoryCardList.addEventListener('mouseleave', () => {
            isMouseDown = false;
        });

        categoryCardList.addEventListener('mouseup', () => {
            isMouseDown = false;
        });

        categoryCardList.addEventListener('mousemove', (e) => {
            if (!isMouseDown) return;
            e.preventDefault();
            const x = e.pageX - categoryCardList.offsetLeft;
            const walk = x - startX;
            categoryCardList.scrollLeft = scrollLeft - walk;
        });
    </script>
</body>

</html>
