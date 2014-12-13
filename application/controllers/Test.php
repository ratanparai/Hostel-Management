<?php

class Test extends Controller implements ControllerInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('Test/index');
    }
}