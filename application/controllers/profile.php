<?php

/**
 * Class Profile
 *
 * To view and edit personal profile
 *
 * @author Ratan
 *
 */
class Profile extends Controller implements ControllerInterface
{

    public function __construct()
    {
        parent::__construct();

        // this will only give logged in user access to the profile controller
        Auth::isLoggedin();
    }

    public function index()
    {

        // Load the profile model
        $ProfileModel = $this->loadModel('Profile');

        // get profile data and save the data to profile array
        // so that we can just use this array to update information as needed
        // in profile view

        $ProfileModel->getProfileInfo();

        // now render the profile index view
        $this->view->render("profile/index");
    }

    public function updateAccountAction($json = true) {
        // load the profile model
        $LoginModel = $this->loadModel('profile');
        // run the updateAccount
        $success = $LoginModel->updateAccount();

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
