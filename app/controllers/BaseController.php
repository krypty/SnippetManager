<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    /**
     * Return array used to populate the sidebar. Must be called by every 
     * controller action that show a view
     * @return array with languages data used for the sidebar
     */
    public static function getListLangage() {
        $allLanguages = Langage::all();

        $userID = 1; //TODO: get ID from user logged
        // to make the where clause work
        if ($userID == null) {
            $userID = -1;
        }

        $langagesData = array();
        foreach ($allLanguages as $langage) {
            $nb = Snippet::where('langage_id', '=', $langage->id)->where(function($query) use (&$userID) {
                        $query->where('public', '=', 1)->orWhere('auteur_id', '=', $userID);
                    })->count();

            if ($nb > 0) {
                $langageData["name"] = $langage->name;
                $langageData["id"] = $langage->id;
                $langageData["count"] = $nb;

                array_push($langagesData, $langageData);
            }
        }
        return $langagesData;
    }

}
