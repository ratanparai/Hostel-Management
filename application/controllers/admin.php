<?php
/**
 * Class Admin
 *
 * Do Admin ralated work such as create, update and delete
 * resource through a admin panel.
 *
 * @author Ratan
 *
 */
class Admin extends Controller implements ControllerInterface
{
    /**
     * call the Controller construct function to init session and database
     * connection for this class.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * (non-PHPdoc)
     * @see ControllerInterface::index()
     */
    public function index(){
        $this->view->render('admin/index');
    }

    /**
     * Controller for add user view
     */
    public function addUser() {
        $this->view->render('admin/addUser');
    }

    public function viewUsers() {
        $this->view->render('admin/viewUsers');
    }
}