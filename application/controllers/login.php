<?php

/**
 * class login
 *
 * Do login related task
 */
class login extends Controller implements ControllerInterface
{

    /**
     * Construct the object by extending basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Index. default action / default "/login" page
     */
    public function index()
    {
        $this->view->render('login/index');
    }

    /**
     * The login action, when we do "/login/login"
     * this take an optional bool parameter to check if we want json output.
     * this output
     * formate is required for ajax call of the login method
     * 
     * @param bool $json
     *            If you want the output to json formate
     */
    public function login($json = false)
    {
        // load the loginModel
        $LoginModel = $this->loadModel('Login');
        // run the login() method of the login_model and save its return state
        $success = $LoginModel->login();
        
        if ($success) {
            
            // check if we want json output or simple header redirect.
            if ($json) {
                // TODO: json output
            } else {
                // redirect to the dashboard of the user
                header('Location: ' . URL . 'dashboard/index');
            }
        } else {
            if ($json) {
                echo $this->generateErrorJson();
            } else {
                // redirect the user to the login form to try again
                header('Location: ' . URL . 'login/index');
            }
        }
    }
}