<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <!-- <script src="/docs/5.3/assets/js/color-modes.js"></script> -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">.
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Login</title>

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        </style>

    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
    
        <div class="container">

            <div class="col-lg-6 col-md-6 col-sm-6 mx-auto text-center pt-3"> 
                <main class="form-signin w-100 m-auto">

                    <div class="card mt-5">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.login') }}">
                                @csrf()
                                <h1 class="h3 mb-3 fw-normal">Sign In</h1>

                                @if (session('error'))
                                    <div class="alert alert-danger mt-4">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {!! session('success') !!}
                                    </div>
                                @endif

                                <div class="row mt-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                                            <label for="email">Email address</label>
                                        </div>
                                        @if($errors->has('email'))
                                            <span id="email_err" class="text-danger text-sm clserr">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <label for="password">Password</label>
                                        </div>
                                        @if($errors->has('password'))
                                            <span id="password_err" class="text-danger text-sm clserr">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                                    </div>
                                </div>

                                <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
                            </form>
                        </div>
                    </div>

                </main>
            </div>

        </div>

        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

    </body>
</html>
