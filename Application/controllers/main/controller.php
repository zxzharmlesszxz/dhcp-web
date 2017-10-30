<?php

/**
 * Class Controller_Main
 */
class Controller_Main extends Controller
{

    /**
     * Controller_Main constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
