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
    public function __construct(){
        parent::__construct();

        // this will only give logged in user access to the profile controller
        Auth::isLoggedin();
    }

    public function index(){

        // Load the profile model
        $ProfileModel = $this->loadModel('Profile');

        // get profile data and save the data to profile array
        // so that we can just use this array to update information as needed
        // in profile view

        $ProfileModel->getProfileInfo();

        // now render the profile index view
        $this->view->render("profile/index");
    }
}
