<!DOCTYPE html>

<html>

<head>

</head>
    <title>{{ $mailData['title'] }}</title>

<body>
    <p>Un nouveau commentaire a été créé sur DarkImmortal, il faut maintenant le modérer :</p>
    
    <h1>{{ $mailData['author'] }}</h1><p> a écrit :</p>

    <p>{{ $mailData['comment'] }}</p>
    <p>Le commentaire suivant a été laissé sur cet article :</p>
    @isset($mailData['post']->groupe)
    <h2>Groupe : {{ $mailData['post']->groupe }}</h2>
    @endisset
    @isset($mailData['post']->morceau)
    <h3>Morceau : {{ $mailData['post']->morceau }}</h3>
    @endisset
    @isset($mailData['post']->album)
    <h3>Album : {{ $mailData['post']->album }}</h3>
    @endisset
    @isset($mailData['post']->theme)
    <h3>Thème : {{ $mailData['post']->theme }}</h3>
    @endisset
    <p>Merci et à bientôt !</p>

</body>

</html>