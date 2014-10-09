<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 * Whenever a controller is created, we also
 * 
 * 1. Initialize a session
 * 2. Check if the user is not logged in anymore (session timeout) but has cookie
 * 3. create a database connection (that will be passed to all models that need a database connection)
 * 4. create a view object
 */
class Controller 
{
	
	// Testing private db object

	
	function __construct()
	{
		Session::init();
		
		// TODO: cookie check, if needed
		
		// create databse connection
		// we call call the database connection from any class that extends this 
		// "Controller" class
		//try {
		//	$this->db = new Database();
		//} catch (PDOException $e) {
		//	die('Database connection could not be established.');
		//}
		
		// create a view object (that does nothing, but provide the view render() method)
		// we are gonna use this view object to create veiw
		// TODO: clearify documentation
		$this->view = new View();
		
		
	}
}