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
    public function login($json = true)
    {
        // load the loginModel
        $LoginModel = $this->loadModel('Login');
        // run the login() method of the login_model and save its return state
        $success = $LoginModel->login();
        
        if ($success) {
            
            // check if we want json output or simple header redirect.
            if ($json) {
                // json feedback successful output
                echo $this->generateJsonFeedback();
            } else {
                // redirect to the dashboard of the user
                header('Location: ' . URL . 'dashboard/index');
            }
        } else {
            if ($json) {
                echo $this->generateJsonFeedback();
            } else {
                // redirect the user to the login form to try again
                header('Location: ' . URL . 'login/index');
            }
        }
    }

    public function register()
    {
        // show the register view
        $this->view->render('login/register');
    }

    /**
     * register action function to take care of the registration call
     *
     * @param string $json
     *            optional to get output as json format;
     */
    public function register_action($json = true)
    {
        // load the login model
        $LoginModel = $this->loadModel('Login');
        // run the registerNewUser
        $success = $LoginModel->registerNewUser();
        
        // if success
        if ($success) {
            // if json output wanted
            if ($json) {
                echo $this->generateJsonFeedback();
            } else {
                // TODO: send admin to show all the register user or again
                // to the register page if he needed to register more users.
            }
            
            // if not successful
        } else {
            // check if we want json output
            if ($json) {
                echo $this->generateJsonFeedback();
            } else {
                // do like redirect the user to the register page
                header('Location: ' . URL . 'login/register');
            }
        }
    }
}
