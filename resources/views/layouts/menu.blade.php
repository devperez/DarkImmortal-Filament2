<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    

        <title>DarkImmortal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link href="{{ asset('css/Hover-master/css/hover.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nosifer&family=Roboto&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
	    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
	    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <!-- Primary Meta Tags -->
        <meta name="title" content="DarkImmortal">
        <meta name="description" content="DarkImmortal est un site de découverte et de partage de musique. Tout ce qui accroche mon oreille est susceptible de se retrouver sur DarkImmortal.fr">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://darkimmortal.fr/">
        <meta property="og:title" content="DarkImmortal">
        <meta property="og:description" content="DarkImmortal est un site de découverte et de partage de musique. Tout ce qui accroche mon oreille est susceptible de se retrouver sur DarkImmortal.fr">
        <meta property="og:image" content="https://www.darkimmortal.fr/img/capture.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://darkimmortal.fr/">
        <meta property="twitter:creator" content="@Endymion666">
        <meta property="twitter:title" content="DarkImmortal">
        <meta property="twitter:description" content="DarkImmortal est un site de découverte et de partage de musique. Tout ce qui accroche mon oreille est susceptible de se retrouver sur DarkImmortal.fr">
        <meta property="twitter:image" content="https://www.darkimmortal.fr/img/capture.png">
        
    </head>
    <body>
        <div class="container-fluid">
	        <div class="row">
	        	<div class="col-md-12 col-sm-12 col-lg-12">
       	   	        <a href=" {{ route('groupes') }}"><h1 class="hvr-underline-from-center sitename">DARKIMMORTAL</h1></a>
                    <ul class="desktop_menu">
                        <li class="customli"><a href="{{ route('groupes') }}">Groupes</a></li>
                        <li class="customli"><a href="{{ route('playlists') }}">Playlists</a></li>
                        <li class="customli"><a href="{{ route('search') }}">Rechercher</a></li>
                        <li class="customli"><a href="{{ route('random') }}" title="un groupe au hasard">Roulette russe</a></li>
                        <li class="customli"><a href="{{ route('about') }}">À propos</a></li>
                    </ul>
	    		</div>
		    </div>
        </div>

        
        <div class="navbar-collapse nav-item dropdown mobile_menu">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:#ff076e;">Menu</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href=" {{ route('black') }}">Black</a></li>
                <li><a class="dropdown-item" href=" {{ route('death') }}">Death</a></li>
                <li><a class="dropdown-item" href=" {{ route('doom') }}">Doom</a></li>
                <li><a class="dropdown-item" href=" {{ route('autre') }}">Autre</a></li>
                <li><hr></li>
                <li class="customli"><a class="dropdown-item" href="{{ route('groupes') }}">Groupes</a></li>
                <li class="customli"><a class="dropdown-item" href="{{ route('playlists') }}">Playlists</a></li>
                <li class="customli"><a class="dropdown-item" href="{{ route('search') }}">Rechercher</a></li>
                <li class="customli"><a class="dropdown-item" href="{{ route('random') }}" title="un groupe au hasard">Roulette russe</a></li>
                <li class="customli"><a class="dropdown-item" href="{{ route('about') }}">À propos</a></li>
            </ul>
        </div>
        @yield('content')
    </body>
</html>
