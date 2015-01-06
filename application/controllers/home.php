<?php
/**
 * Home Controller. This controller will control interaction between user and
 * website after the user logged in with their password.
 * @author Ratan
 *
 */
class Home extends Controller implements ControllerInterface
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('home/index');
    }
}