<?php

/**
 * Class index
 *
 * The index controller
 */
class Index extends Controller implements ControllerInterface
{

    /**
     * construct the object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle when the user move to .
     *
     *
     *
     *
     * ./index/index or ../index (both are same) or just the URL.
     * checked in the Application class and send it to the controller if no valid
     * controller is selected.
     */
    public function Index()
    {
        $this->view->render('index/index');
    }
}
