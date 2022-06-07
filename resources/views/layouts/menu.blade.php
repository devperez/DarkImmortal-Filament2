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
        
    </head>
    <body>
        <div class="container-fluid">
	        <div class="row">
	        	<div class="col-md-12 col-sm-6">
        	    		<a href=" {{ route('groupes') }}"><h1 class="hvr-underline-from-center sitename">DARKIMMORTAL</h1></a>
			</div>
		</div>
        </div>
    <nav class="navbar navbar-light bg-grey">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:150px; color:black;">Genres</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href=" {{ route('black') }}">Black</a></li>
                        <li><a class="dropdown-item" href=" {{ route('death') }}">Death</a></li>
                        <li><a class="dropdown-item" href=" {{ route('doom') }}">Doom</a></li>
                        <li><a class="dropdown-item" href=" {{ route('autre') }}">Autre</a></li>
                        <div class="mobilemenu">
                        	<ul>
                        		<li><hr></li>
                        		<li class="customli"><a href="{{ route('groupes') }}">Groupes</a></li>
                        		<li class="customli"><a href="{{ route('search') }}">Chercher un groupe</a></li>
                        		<li class="customli"><a href="{{ route('random') }}" title="un groupe au hasard">Roulette russe</a></li>
                        		<li class="customli"><a href="{{ route('about') }}">À propos</a></li>
                        	</ul>
                        </div>
                    </ul>
                </li>
                <div class="container-fluid desktopmenu">
                    <ul style="display:flex; justify-content:center;">
                        <li class="customli"><a href="{{ route('groupes') }}">Groupes</a></li>
                        <li class="customli"><a href="{{ route('search') }}">Chercher un groupe</a></li>
                        <li class="customli"><a href="{{ route('random') }}" title="un groupe au hasard">Roulette russe</a></li>
                        <li class="customli"><a href="{{ route('about') }}">À propos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
            @yield('content')
    </body>
</html>
