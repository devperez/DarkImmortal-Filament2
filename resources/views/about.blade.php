@extends('layouts.menu')
@section('content')
<link href="{{ asset('css/mobile_menu.css') }}" rel="stylesheet">

<div class="container" style="margin-top: 30px;">
    <p class="about">
        01/10/2021<br />
        Bonjour et soyez les bienvenus sur ce site.<br />
        Certains d'entre vous ont peut-être connu DarkImmortal.magicrpm.com, un blog que j'ai tenu "religieusement" pendant des années sur magicrpm.com. La plateforme n'existe plus depuis plusieurs années et mon blog est également perdu depuis plusieurs années.<br />
        Le but de ce site est double : je souhaite recommencer à écouter et à partager de la musique mais je veux aussi coder tout le site, histoire d'avoir exactement ce que je veux. Du coup, le design et les fonctionnalités sont appelés à changer, à évoluer au fil de mes envies, de mes exigences et de mes compétences.<br />
        Au menu : de la musique, du Metal, bien évidemment, mais pas que du Metal. Tout ce qui accrochera mon oreille à un moment ou à un autre pourra faire l'objet d'un article. <br/>J'espère vous retrouver ici au moins aussi nombreux que sur mon ancien blog.<br />
        Vous pouvez également me retrouver sur le réseau social musical <a href="https://www.last.fm/fr/user/Empyrium666" style="color:#ff076e">Lastfm</a>.<br />
        Bonnes découvertes !
    </p>
<hr>
    <p class="about">
        Notes sur la mise à jour de juillet 2022 :<br />
        - Refonte totale du back office : passage sous Filament.<br />
        - Au revoir Disquus pour les commentaires : développement de mon propre système de commentaires modérés à priori.<br />
        - Utilisation de Livewire pour le formulaire du commentaire.<br />
        - Utilisation des Events et des Listeners pour être informer automatiquement de la création d'un commentaire.<br />
        - Légère retouche des cartes : chaque image est maintenant exactement à la même taille, affichage du nombre de vues par carte et du nombre de commentaires par carte et le tout de façon dynamique.<br />
        - Intégration de l'API de Lastfm pour afficher mes derniers scrobbles. Il y aura peut-être d'autres fonctionnalités basées sur cette API dans le futur.<br />
        - Le menu de navigation est plus ergonomique.<br />
        - Augmentation de la taille des vidéos sur les pages des groupes.<br />
        
    </p>
</div>
@endsection
