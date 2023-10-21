<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('pa-auto.ico')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{$title}}</title>
    @yield('meta')
</head>



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
                <li class="nav-item ">
                    <a href="/search" class="nav-link custom-yellow-text">Station Finder</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer>
        
        <div class="col-sm-12 text-center bg-white py-4 mt-4 col-sm-12">
            <p>This site is privately maintained, not affiliated with PennDOT or any other government body.
            <br> All information used on this site is within the public domain. 
            <br>Data used about stations is as of <b>{{config('metadata.dataAsOf')}}</b>. 
            
            </p>
        </div>
    
    </footer>
</body>


@yield('scripts')
</html>