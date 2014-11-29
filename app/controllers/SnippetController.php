<?php

class SnippetController extends BaseController {

    /**
     * Method used to get snippet information
     * @param type $id ID of the snippet
     * @return type array with snippet info
     */
    public static function getInfo($id) {

        $dateFormat = "d/m/Y H:i:s";

        $snippet = Snippet::find($id);

        $lang = Langage::find($snippet->langage_id);
        $author = User::find($snippet->auteur_id);

        $snippetInfo = array(
            "id" => $snippet->id,
            "title" => $snippet->name,
            "author" => $author->pseudo,
            "language" => $lang->name,
            "language_id" => $snippet->langage_id,
            "public" => $snippet->public,
            "visibility" => $snippet->public == "1" ? "public" : "privé",
            "code" => $snippet->code,
            "syntaxColorCode" => $lang->syntaxColorCode,
            "createdAt" => date($dateFormat, strtotime($snippet->created_at)),
            "updatedAt" => date($dateFormat, strtotime($snippet->updated_at))
        );
        return $snippetInfo;
    }

    public static function getInfoWithFilter($id, $cols) {
        $snippetInfo = SnippetController::getInfo($id);

        foreach ($snippetInfo as $key => $value) {
            if (!in_array($key, $cols)) {
                unset($snippetInfo[$key]);
            }
        }

        return $snippetInfo;
    }

    ///
    ///  View snippet
    ///
    public function viewSnippetShow($id) {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        $snippetData = SnippetController::getInfo($id);

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

    public function addSnippetShow() {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        $data = array(
            "languages" => $languages,
            "title" => "Ajouter un snippet",
            "languagesSelect" => $languagesSelect
        );
        return View::make('add_edit_snippet', $data);
    }

    public function addSnippetPost() {
        $tab = Input::all();
        $snippet = new Snippet();
        $snippet->name = $tab["inputTitle"];
        $snippet->langage_id = $tab["inputLanguage"];
        if (isset($tab["inputPublic"]))
            $snippet->public = 1;
        else
            $snippet->public = 0;

        $snippet->code = $tab["snippetContent"];
        $snippet->auteur_id = 1; //TODO changer par l'auteur Connectée

        $snippet->save();

        $id = $snippet->id;
        return Redirect::to('viewsnippet/' . $id);
    }

    ///
    /// Edit snippet
    ///

    /**
     * Show the form to edit the snippet
     * @param int $id
     */
    public function editSnippetShow($id) {
        $languages = parent::getListLangage();

        $languagesSelect = LangageController::getIdName();

        $snippetData = SnippetController::getInfo($id);

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
    public function editSnippetPost() {
        //TODO: get all data from Input::get('XXX'). See: http://laravel.com/docs/4.2/requests#basic-input
        // ...
        // UPDATE the snippet in the database
        // ...
        ///Je doit pouvoir recupere L'ID
        print_r(Input::all());
        echo "edit snippet post"; // TODO: remove me
    }

    ///
    /// Delete snippet
    ///

    /**
     * Remove the snippet from the database
     * @param int $id
     */
    public function deleteSnippet($id) {
        $snip = Snippet::find($id);
        $snip->delete();

        $tab = Likes::where("id_snippets", "=", $id)->get();
        foreach ($tab as $likes) {
            $likes->delete();
        }

        return Redirect::to('/');
    }

    ///
    /// Like snippet
    ///

    public function likeSnippet($id) {

        $like = new Likes();
        $idUser = 1;
        $tab = Likes::where("id_snippets", "=", $id, "and", "id_user", "=", $idUser)->get();

        if (count($tab) < 1) {
            $like->id_user = $idUser; //TODO Utilisateur Courant
            $like->id_snippets = $id;
            $like->save();
        }

        return Redirect::to('viewsnippet/' . $id);
    }

    public function unlikeSnippet($id) {
        //TODO get user id and remove $id and user's id to Likes table
        echo "unliked snippet $id"; // TODO: remove me
    }

    ///
    /// List snippets by language
    ///

    public function listSnippetByLanguage() {
        $languages = parent::getListLangage();

        $language_id = Input::get("id");

        $language = DB::table("langages")->find($language_id);

        $snippetByLanguageData = array();

        $snippets_id = DB::table('snippets')->where("langage_id", $language_id)->lists('id');

        $columnsNeeded = array("id", "title", "author", "updatedAt", "createdAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($snippetByLanguageData, $snippetData);
        }

        $searchResultsSnippetsTable = array(
            "tableTitle" => "",
            "cols" => array("Nom", "Auteur", "Date de modification", "Date de création"),
            "snippetsData" => $snippetByLanguageData
        );

        $data = array(
            "language_name" => $language->name,
            "languages" => $languages,
            "snippetsByLanguageTable" => $searchResultsSnippetsTable
        );

        return View::make('snippets_by_language', $data);
    }

}

?>
