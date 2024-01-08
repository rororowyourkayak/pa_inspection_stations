<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="8Hf2Cxe81yvKLjMfpec0ct8kvYkfCyTgoecHKJbFsS4" />
    <meta name="google-adsense-account" content="ca-pub-1981663975150701">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1981663975150701"
     crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('pa-auto.ico')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{$title ?? 'PA Auto Safety Inspections'}}</title>
    <meta name="keywords" content="auto, inspection, safety inspection, auto safety inspection,inspection station, inspection center,annual, emissions inspection, cars, automobiles, pa auto, pennsylvania, mechanics, auto shop, "/>
    @yield('meta')
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BLEKRFB6FL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BLEKRFB6FL');
</script>

<body class="custom-font d-flex flex-column h-100">
    <nav class="navbar navbar-expand-md navbar-dark custom-blue-bg sticky-top">
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
    <div class="row mw-100">
        <div class="list-group list-group-flush other-blue-bg d-sm-none d-none d-md-block col-md-2 h-25">
            <a href="/search" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Station Finder</a>
            <a href="/stations" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Stations</a>
            <a href="/counties" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Counties</a>
            <a href="/cities" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Cities</a>
            <a href="/counties/county/allegheny" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Allegheny County</a>
            <a href="/counties/county/montgomery" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Montgomery County</a>
            <a href="/counties/county/philadelphia" class="list-group-item list-group-item-action other-blue-bg text-white ms-2">Philadelphia County</a>
        </div>
    <div class="col-md-10">
        @yield('content')
    </div>
    </div>
            

    

    <footer class="footer mt-auto">
        
        <div class="w-100 text-center bg-white py-4 mt-4">
            <p>This site is privately maintained, not affiliated with PennDOT or any other government body.
            <br> All information used on this site is within the public domain. 
            <br>Disclaimer: This site's owner is not liable for actions taken while using information from this site. 
            <br>This site may potential contain data inaccuracies and does not provide legal advice or calls to action.
            </p>
        </div>
    
    </footer>
</body>


@yield('scripts')

<style>
    .list-group-item-action:hover{
        color: black !important;
    }
</style>
</html>