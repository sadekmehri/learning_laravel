<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <title>Page not found</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('photo/app.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/error/404.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
<section>
    <div class="error-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="error-text">
                        <h1 class="error">404 Error</h1>
                        <div class="im-sheep">
                            <div class="top">
                                <div class="body"></div>
                                <div class="head">
                                    <div class="im-eye one"></div>
                                    <div class="im-eye two"></div>
                                    <div class="im-ear one"></div>
                                    <div class="im-ear two"></div>
                                </div>
                            </div>
                            <div class="im-legs">
                                <div class="im-leg"></div>
                                <div class="im-leg"></div>
                                <div class="im-leg"></div>
                                <div class="im-leg"></div>
                            </div>
                        </div>
                        <h4>Oops! This page Could Not Be Found!</h4>
                        <p>Sorry bit the page you are looking for does not exist, have been removed or name changed.</p>
                        <a href="{{ route('home.index') }}" class="btn btn-primary btn-round">Go to homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
