<?php namespace Lib\Langage;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangagesController
 *
 * @author Kevin
 */
class LangagesController extends \Lib\Commun\BaseRessourceController
{
    
    public function __construct(LangageGestion $gestion) 
    {
        parent::__construct();
        $this->gestion = $gestion;
        $this->base = class_basename(__NAMESPACE__);
        $this->message_store = "Le langages a été ajouté";
        $this->message_update = "Le langages a été modifié";
    }
    
}

?>
