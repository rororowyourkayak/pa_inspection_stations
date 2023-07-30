<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark custom-blue-bg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">PA Auto Inspection Stations</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">Link 1</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">Link 2</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">Link 3</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')

    <footer>
        
        <div class="col-sm-12 text-center bg-white py-4">
            <p>This site is privately maintained, not affiliated with PennDOT or any other government body.
            <br> Information regarding inspection programs and stations was retrieved from PennDOT.
            <br> All information used on this site is within the public domain. 
            </p>
        </div>
    
    </footer>
</body>


@yield('scripts')
</html>