<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    {{-- @vite(['resources/css/app.scss', 'resources/js/app.js']) --}}

    <title>{{$title}}</title>
</head>
<style>
    .steelblueBG{background-color:#4682B4; color:white; }
</style>


<body class="custom-font">
    <nav class="navbar navbar-expand-sm navbar-dark custom-blue-bg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">PA Auto Inspection Stations</a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/stations" class="nav-link text-white">Stations</a>
                </li>
                <li class="nav-item">
                    <a href="/counties" class="nav-link text-white">Counties</a>
                </li>
                <li class="nav-item">
                    <a href="/cities" class="nav-link text-white">Cities</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer>
        
        <div class="col-sm-12 text-center bg-white py-4 mt-4 col-sm-12">
            <p>This site is privately maintained, not affiliated with PennDOT or any other government body.
            <br> Information regarding inspection programs and stations was retrieved from PennDOT.
            <br> All information used on this site is within the public domain. 
            <br>Data used about stations is as of <b>{{config('metadata.dataAsOf')}}</b>.
            </p>
        </div>
    
    </footer>
</body>


@yield('scripts')
</html>