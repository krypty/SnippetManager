<div id="header-userpanel">
    <h4>Bienvenue {{"Pseudo"//Auth::user()->pseudo}} !</h4>
    <ul>
        <li>{{HTML::link("addsnippet", "Ajouter un snippet")}}</li>
        <li>{{HTML::link("profile", "Mon profil")}}</li>
        <li>{{HTML::link("mysnippets", "Mes snippets")}}</li>
        <li>{{HTML::link("likedsnippets", "Les snippets que j'aime")}}</li>

        <!-- TODO: changer le lien pour se déconnecter -->
        <li>{{HTML::link("logout", "Se déconnecter")}}</li>
    </ul>
</div>
