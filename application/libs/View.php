<?php

/**
 * Class View
 * 
 * Provides the methods all view will have
 */
class View
{
	/**
	 * Simply includes or show view. This is done from the controller. In the controller, you usually say
	 * $this->view->render('help/index'); to show the view index.php in the folder help.
	 * 
	 * Usally the class and method are the same like the View. but sometimes we need to show different
	 * views.
	 * @param string $filename Path of the to-be-rendered view, usally folder/file.php
	 */
	public function render($filename)
	{
		require VIEWS_PATH . '_templates/header.php';
		require VIEWS_PATH . $filename . '.php';
		require VIEWS_PATH . '_templates/footer.php';
		
	}
	
	/**
	 * Checks if the passed string is the currently active controller.
	 * Usefull for handling the navigation's active/non-active link.
	 * @param string $filename
	 * @param string $navigation_controller
	 * @return bool Shows if the controller is used or not.
	 *
	private function checkForActiveController($filename, $navigation_controller)
	{
		$spilt_filename = explode('/', $filename);
		$active_controller = $spilt_filename[0];
		
		if($active_controller == $navigation_controller) {
			return true;
		}
		return false;
	}
	*/
}