<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Fontfaces CSS-->
        <link href="{{ asset('backend/assets/css/font-face.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('backend/assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="{{ asset('backend/assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('backend/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('backend/assets/css/theme.css') }}" rel="stylesheet" media="all">

    </head>
    <body class=" animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            @include('partials.sidebar')
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            @include('partials.sidebar')
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                @include('partials.header')
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                @yield('main')
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>
        {{--  @include('partials.header')
        <section>
            @include('partials.sidebar')
            <div class="container">
                @yield('content')
            </div>
            @include('partials.footer')
        </section>  --}}

        {{--  <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>  --}}
      @include('partials.scripts')
    </body>
</html>
