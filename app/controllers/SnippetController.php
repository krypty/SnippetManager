<?php

class SnippetController extends BaseController {

    /**
     * Method used to get snippet information
     * @param type $id ID of the snippet
     * @return type array with snippet info
     */
    public static function getInfo($id) {
        $objet = Snippet::find($id);

        $lang = Langage::find($objet->langage_id);

        $tab = array(
            "title" => $objet->name,
            "language" => "$lang->name",
            "public" => 1,
            "code" => $objet->code
        );
        return $tab;
    }

    ///
    ///  View snippet
    ///
    public function ViewSnippetShow($id) {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        //TODO: retourner un langage sous forme de tableau associatif
        //$languagesSelect["syntaxColorCode"] = "clike";
        $syntaxColorCode = "clike";


        $snippetData = SnippetController::getInfo($id);

        //TODO: intégrer ces champs à SnippetController::getInfo()
        $snippetData["author"] = "toto";
        $snippetData["createdAt"] = "11/12/2014 11:20";
        $snippetData["updatedAt"] = "11/12/2014 11:25";
        // visibility != public, visibiliy est soit "public" ou "privé" et public vaut respectiviement soit 1 ou 0. Le premier est utilisé pour l'affichage, le second pour le stockage dans la BDD
        $snippetData["visibility"] = "public";
        $snippetData["syntaxColorCode"] = $syntaxColorCode;

        $data = array(
            "languages" => $languages,
            "title" => "Détail du snippet" . $snippetData['title'],
            "languagesSelect" => $languagesSelect,
            "snippetData" => $snippetData,
        );
        return View::make('view_snippet', $data);
    }

    ///
    /// Add snippet
    ///

    public function AddSnippetShow() {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        $data = array(
            "languages" => $languages,
            "title" => "Ajouter un snippet",
            "languagesSelect" => $languagesSelect
        );
        return View::make('add_edit_snippet', $data);
    }

    public function AddSnippetPost() {
        //TODO: get all data from Input::get('XXX'). See: http://laravel.com/docs/4.2/requests#basic-input
        // ...
        // SAVE the snippet in the database
        // ...
        echo "add snippet post"; // TODO: remove me
    }

    ///
    /// Edit snippet
    ///

    /**
     * Show the form to edit the snippet
     * @param int $id
     */
    public function EditSnippetShow($id) {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        $snippetData = SnippetController::getInfo($id);
        //TODO: integrate this in getInfo()
        $snippetData["syntaxColorCode"] = "clike";

        $data = array(
            "languages" => $languages,
            "title" => "Modifier un snippet",
            "languagesSelect" => $languagesSelect,
            "snippetData" => $snippetData
        );
        return View::make('add_edit_snippet', $data);
    }

    /**
     * Update the snippet with the data from the form
     */
    public function EditSnippetPost() {
        //TODO: get all data from Input::get('XXX'). See: http://laravel.com/docs/4.2/requests#basic-input
        // ...
        // UPDATE the snippet in the database
        // ...
        echo "edit snippet post"; // TODO: remove me
    }

    ///
    /// Delete snippet
    ///

    /**
     * Remove the snippet from the database
     * @param int $id
     */
    public function DeleteSnippet($id) {
        //TODO remove snippet from database
        // Maybe add a confirmation message and a success message + redirection ?
        echo "delete snippet $id"; // TODO: remove me
    }

    ///
    /// Like snippet
    ///

    public function LikeSnippet($id) {
        //TODO get user id and add $id and user's id to Likes table
        // do not forget to check if the user has not already liked the snippet
        echo "liked snippet $id"; // TODO: remove me
    }

    public function UnlikeSnippet($id) {
        //TODO get user id and remove $id and user's id to Likes table
        echo "unliked snippet $id"; // TODO: remove me
    }

}

?>
