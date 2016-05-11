<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Surveillance extends Controller_Base_preDispatch
{

    /** Action for index page */
    public function action_send()
    {
        $password = $this->request->param('auth');
        if ($this->surveillance->checkPassword($password))
            $this->surveillance->send();
        else
            $this->redirect('/');
    }

    public function action_flush()
    {
        $password = $this->request->param('auth');
        if ($this->surveillance->checkPassword($password))
            $this->surveillance->flush();

        $this->redirect('/');
    }

}
