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
            "numberOfLikes" => Likes::select()->where('id_snippets', '=', $id)->count(),
            "title" => $snippet->name,
            "author" => $author->pseudo,
            "author_id" => $author->id,
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

        foreach (array_keys($snippetInfo) as $key) {
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

        $user_id = Auth::check() ? Auth::user()->id : -1;
        $isSnippetAlreadyLiked = SnippetController::isSnippetLikedByUser($user_id, $id);
        $data = array(
            "languages" => $languages,
            "title" => "Détail du snippet" . $snippetData['title'],
            "languagesSelect" => $languagesSelect,
            "snippetData" => $snippetData,
            "isSnippetAlreadyLiked" => $isSnippetAlreadyLiked
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
            "languagesSelect" => $languagesSelect,
        );
        return View::make('add_edit_snippet', $data);
    }

    public function addSnippetPost() {
        // validation
        $rules = array(
            'name' => 'required',
            'code' => 'required',
        );
        $inputToValidate = array(
            "name" => Input::get("inputTitle"),
            "code" => Input::get("snippetContent")
        );
        $validator = Validator::make($inputToValidate, $rules);

        if ($validator->fails()) {
            return Redirect::to("addsnippet")->withErrors($validator)->withInput();
        }

        // persistance
        $snippet = new Snippet();
        $snippet->name = Input::get("inputTitle");
        $snippet->langage_id = Input::get("inputLanguage");
        if (Input::has("inputPublic")) {
            $snippet->public = 1;
        } else {
            $snippet->public = 0;
        }

        $snippet->code = Input::get("snippetContent");
        $snippet->auteur_id = Auth::user()->id;

        $snippet->save();

        $id = $snippet->id;
        Session::flash('message', 'Le snippet a été ajouté avec succès !');
        Session::flash('alert-class', 'alert-success');
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
        $id = Input::get('snippet_id');

        // validation
        $rules = array(
            'name' => 'required',
            'code' => 'required',
        );
        $inputToValidate = array(
            "name" => Input::get("inputTitle"),
            "code" => Input::get("snippetContent")
        );
        $validator = Validator::make($inputToValidate, $rules);

        if ($validator->fails()) {
            return Redirect::to("editsnippet/$id")->withErrors($validator)->withInput();
        }

        if (isset($id)) {
            $snippet = Snippet::find($id);
            $snippet->name = Input::get('inputTitle');
            $snippet->code = Input::get('snippetContent');
            $snippet->langage_id = Input::get('inputLanguage');
            $snippet->public = Input::get('inputPublic') == "yes" ? 1 : 0;
            $snippet->save();

            Session::flash('message', 'Le snippet a été modifié avec succès !');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to("viewsnippet/$id");
        } else {
            echo "Erreur: Le snippet n'a pas été mis à jour";
        }
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

        Session::flash('message', 'Le snippet a été supprimé avec succès !');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('/');
    }

    ///
    /// Like snippet
    ///

    public function likeSnippet($id) {

        $like = new Likes();

        if (Auth::check()) {
            $idUser = Auth::user()->id;

            if (!SnippetController::isSnippetLikedByUser($idUser, $id)) {
                $like->id_user = $idUser;
                $like->id_snippets = $id;
                $like->save();
            }
        }
        $snippetTitle = Snippet::find($id)->name;
        Session::flash('message', 'Vous aimez désormais le snippet <b>' . $snippetTitle . '</b> !');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('viewsnippet/' . $id);
    }

    public function unlikeSnippet($id) {
        if (Auth::check()) {
            $idUser = Auth::user()->id;

            $like = Likes::where("id_user", "=", $idUser)->where("id_snippets", "=", $id);
            $like->delete();
        }

        $snippetTitle = Snippet::find($id)->name;
        Session::flash('message', "Vous n'aimez plus le snippet <b>$snippetTitle</b>");
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('viewsnippet/' . $id);
    }

    ///
    /// List snippets by language
    ///

    public function listSnippetByLanguage() {
        $languages = parent::getListLangage();

        // to make the where clause work
        $userID = Auth::check() ? Auth::user()->id : -1;

        $language_id = Input::get("id");

        $language = Langage::find($language_id);

        $snippetByLanguageData = array();

        $snippets_id = Snippet::where("langage_id", $language_id)->where(function($query) use (&$userID) {
                    $query->where('public', '=', 1)->orWhere('auteur_id', '=', $userID);
                })->lists('id');

        $columnsNeeded = array("id" => "id", "title" => "Nom", "author" => "Auteur", "updatedAt" => "Date de modification", "createdAt" => "Date de création");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, array_keys($columnsNeeded));
            array_push($snippetByLanguageData, $snippetData);
        }

        $searchResultsSnippetsTable = array(
            "tableTitle" => "",
            "cols" => $columnsNeeded,
            "snippetsData" => $snippetByLanguageData
        );

        $data = array(
            "language_name" => $language->name,
            "languages" => $languages,
            "snippetsByLanguageTable" => $searchResultsSnippetsTable
        );

        return View::make('snippets_by_language', $data);
    }

    /**
     * Teste si le snippet a déjà été liké par l'utilisateur
     * @param type $user_id
     * @param type $snippet_id
     * @return true si l'user a déjà like le snippet, sinon false
     */
    public static function isSnippetLikedByUser($user_id, $snippet_id) {
        $tab = Likes::where("id_snippets", "=", $snippet_id)->where("id_user", "=", $user_id)->get();
        return count($tab) > 0;
    }

}

?>
