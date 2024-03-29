<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> demo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>

    <div class="hero_area">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="">e_store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('web') }}">{{ __('word.Home') }}</a>
                        <a class="nav-link" href="{{ route('web.company') }}">{{ __('word.company') }}</a>
                        <a class="nav-link" href="{{ route('web.category') }}">{{ __('word.category') }}</a>
                        <a class="nav-link" href="{{ route('problem') }}">{{ __('word.problem') }}</a>
                        <a class="nav-link "href="{{ route('filter') }}">filter serach</a>
                        <a class="nav-link "href="">offer product</a>
                    </div>
                </div>



                <div class="container">
                    <li class="nav-item">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endforeach
                    </li>
                </div>

                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a id="navbarDropdown" class="nav-link" href="{{ route('profile.index') }}" role="button">
                                    {{ __('word.profile') }}
                                </a>
                            </div>

                        </li>
                    @endguest
                </ul>
                <div class="col-12">
                    <div class="dropdown">
                        <a class="btn btn-outline-dark" href="{{ route('show.cart') }}">
                            <i class="fa-solid fa-cart-shopping"></i> {{ __('word.Cart') }} <span
                                class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                    </div>

                </div>
        </nav>
    </div>




    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
