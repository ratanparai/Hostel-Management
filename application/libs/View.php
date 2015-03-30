<?php

/**
 * Class View
 *
 * Provides the methods all view will have.
 * This class is not for extends. Whenever a Controller object is created, the controller
 * class's __construct function will create a view object so that the object of the classes that have
 * controller class as parent can use this "View" class's render method to render the output
 */
class View
{

    /**
     * Simply includes or show view.
     * This is done from the controller. In the controller, you usually say
     * $this->view->render('help/index'); to show the view index.php in the folder help.
     *
     * Usally the class and method are the same like the View. but sometimes we need to show different
     * views.
     *
     * @param string $filename
     *            Path of the to-be-rendered view, usally folder/file.php
     * @param array $data
     *            Data to be used in the view
     */
    public function render($filename, $data=NULL)
    {

        if($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        require VIEWS_PATH . '_templates/header.php';
        require VIEWS_PATH . $filename . '.php';
        require VIEWS_PATH . '_templates/footer.php';
    }

    /**
     * Checks if the passed string is the currently active controller-action (=method).
     * Useful for handling the navigation's active/non-active link.
     *
     * @param string $filename
     * @param string $navigation_action
     * @return bool Shows if the action/method is used or not
     */
    public function checkForActiveAction($filename, $navigation_action)
    {
        $split_filename = explode("/", $filename);
        $active_action = $split_filename[1];

        if ($active_action == $navigation_action) {
            return true;
        }
        // default return of not true
        return false;
    }

    public function checkForActiveController($filename, $navigation_controller)
    {
        $split_filename = explode("/", $filename);
        $active_controller = $split_filename[0];

        if ($active_controller == $navigation_controller) {
            return true;
        }
        // default return of not true
        return false;
    }
}
