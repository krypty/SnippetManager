<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Snippet Manager - réinitialisation de votre mot de passe</h2>

        <p>
            Vous avez récemment demandé à réinitialiser votre mot de passe sur SnippetManager. <br/>
            Voici un lien réinitiliser votre mot de passe: {{ URL::to('password/reset', array($token)) }} <br/>
            Dépêchez-vous ce lien expire dans {{ Config::get('auth.reminder.expire', 60) }} minutes.
        </p>
    </body>
</html>
