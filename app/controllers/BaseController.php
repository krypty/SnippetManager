<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

        public function getListLangage()
        {
            $tabLangage = Langage::all();
        
            $langages = array();
            foreach ($tabLangage as $langage)
            {
                 $nb = Snippet::where('langage_id','=',$langage->id)->count();
                 
                 if($nb>0)
                 {
                    $langages[$langage->name] = $nb;
                 }
            }
            return $langages;
        }
}
