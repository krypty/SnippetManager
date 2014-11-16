<header class="col-md-12">
    <div class="col-md-8" id="header-title">
        <h1>Snippet manager</h1>
        <h2>Gérez vos bouts d'code !</h2>
    </div>
    <div class="col-md-4" id="user-panel">
        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label for="inputPseudo" class="col-md-2 control-label">Pseudo</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="inputPseudo" placeholder="Pseudo">
                </div>

            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-md-2 control-label">Mot de passe</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div class="col-md-6 col-xs-6 text-left">
                        <div class="checkbox">
                            <label for="cbxRemember">
                                <input type="checkbox" id="cbxRemember"> Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <button type="submit" class="btn btn-success">Se connecter</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <a href="#">S'inscrire</a>
                    {{HTML::link("passwordlost", "Mot de passe oublié")}}
                </div>
            </div>
        </form>
    </div>

</header>