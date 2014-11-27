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
            "public" => $snippet->public,
            "visibility" => $snippet->public == "1" ? "public" : "privé",
            "code" => $snippet->code,
            "syntaxColorCode" => $lang->syntaxColorCode,
            "createdAt" => date($dateFormat, strtotime($snippet->created_at)),
            "updatedAt" => date($dateFormat, strtotime($snippet->updated_at))
        );
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
        //TODO: get all data from Input::get('XXX'). See: http://laravel.com/docs/4.2/requests#basic-input
        // ...
        // SAVE the snippet in the database
        // ...
        echo "add snippet post"; // TODO: remove me
        echo "<pre>";
        print_r(Input::all());
        echo "</pre>";
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
        //TODO remove snippet from database
        // Maybe add a confirmation message and a success message + redirection ?
        echo "delete snippet $id"; // TODO: remove me
    }

    ///
    /// Like snippet
    ///

    public function likeSnippet($id) {
        //TODO get user id and add $id and user's id to Likes table
        // do not forget to check if the user has not already liked the snippet
        echo "liked snippet $id"; // TODO: remove me
    }

    public function unlikeSnippet($id) {
        //TODO get user id and remove $id and user's id to Likes table
        echo "unliked snippet $id"; // TODO: remove me
    }

}

?>
