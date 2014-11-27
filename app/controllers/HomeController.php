<?php

class HomeController extends BaseController {

    public function showWelcome() 
    {
       $languages = parent::getListLangage();

       $tabSnippets = DB::table('snippets')->orderBy('created_at', 'desc')->get();
        
        
        if(count($tabSnippets)>10)
            $max = 10;
        else
            $max = count($tabSnippets);
        
        $newestSnippetData = array();
        
        for($i = 0;$i<$max;$i++)
        {
            $newestSnippetData[$i] = array(
                "name"=>$tabSnippets[$i]->name,
                "language"=>Langage::find($tabSnippets[$i]->langage_id)->name,
                "date"=>$tabSnippets[$i]->created_at,
                "id"=>$tabSnippets[$i]->id
            );
        }

        $newestSnippetTable = array(
            "tableTitle" => "Derniers snippets ajoutés",
            "cols" => array("Nom", "Langage", "Date d'ajout"),
            "snippetsData" => $newestSnippetData
        );

        
        
        $n = 10; // show limit
        $data = DB::table('likes')->select('*', DB::raw('COUNT(*) as cpt'))->groupBy('id_snippets')->orderBy('cpt', 'DESC')->limit($n)->get();
       // echo $data[0]->id_snippets;
        
        if(count($data)>10)
            $max = 10;
        else
            $max = count($data);
        
        $topSnippetData = array();
        
        for($i = 0;$i<$max;$i++)
        {
            $snip = Snippet::find($data[$i]->id_snippets);
            $topSnippetData[$i] = array(
                "name"=>$snip->name,
                "language"=>Langage::find($snip->langage_id)->name,
                "date"=>$snip->updated_at,
                "id"=>$snip->id
            );
        }
     
        $topSnippetTable = array(
            "tableTitle" => "Top des snippets ajoutés",
            "cols" => array("Nom", "Langage", "Date de modification"),
            "snippetsData" => $topSnippetData
        );

        $data = array(
            "languages" => $languages,
            "newestSnippetTable" => $newestSnippetTable,
            "topSnippetTable" => $topSnippetTable
        );

        return View::make('index', $data);
    }

}
