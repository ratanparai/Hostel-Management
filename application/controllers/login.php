<?php

/**
 * class login
 * 
 * Do login related task
 */
class login extends Controller implements ControllerInterface
{
	public function index()
	{
		$this->view->render('login/index');
	}
}