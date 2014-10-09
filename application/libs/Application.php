<?php

/**
 * Class Application
 * The heart of the app
 */
class Application
{
	/** @var null The controller part of the URL */
	private $url_controller;
	/** @var null The method part (of the above controller) of the URL */
	private $url_action;
	/** @var null Parameter one of the URL **/
	private $url_parameter_1;
	/** @var null Parameter two of the URL **/
	private $url_parameter_2;
	/** @var null Parameter three of the URL **/
	private $url_parameter_3;
	
	/**
	 * Constructor of the Application class
	 * Parse the URL, load required controller and actually do every bit of work
	 * to run the app.
	 */
	public function __construct() {
		$this->spiltUrl();
		
		// For debug: uncomment the line line bellow.
		// echo "Controller: {$this->url_controller}, Action: {$this->url_action}";
		
		// check for controller: is the url_controller NOT empty?
		if($this->url_controller) {
			// check for cotroller: does such controller exist ?
			if(file_exists(CONTROLLERS_PATH . $this->url_controller . '.php')) {
				// if so then load the file and create this controller
				// example: if the controller is car, then this line would translate into $this->car = new car();
				require CONTROLLERS_PATH . $this->url_controller . '.php';
				$this->url_controller = new $this->url_controller();
				
				// check for method: does such a method exist in the controller ?
				if($this->url_action) {
					if(method_exists($this->url_controller, $this->url_action)) {
						// call the method and pass the arguments to it
						if(isset($this->url_parameter_3)) {
							$this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2, $this->url_parameter_3);
						} elseif (isset($this->url_parameter_2)) {
							$this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2, $this->url_parameter_3);
						} elseif (isset($this->url_parameter_1)) {
							$this->url_controller{$this->url_action}($this->url_parameter_1);
						} else {
							// if there is no parameter then just call the method without any arguments
							$this->url_controller->{$this->url_action}();
						}
					} else {
						// TODO: implement error check
						// action doesn't match anything in our predefined action (don't have any method in the controller
						// to process the action)
						die('Invalid action');
					}
				} else {
					// there is no action provided. like http://example.com/controll/ 
					// default/fallback: call the index() method of the selected controller.
					$this->url_controller->index();
				}
			} else {
				// there is no appropiate controller that is requested
				// TODO: implement error page
				die("controller doesn't exist.");
			}
			
		} else {
			// invalid URL, so simply show home/index
			require CONTROLLERS_PATH . 'index.php';
			$controller = new Index();
			$controller->index();
		}
		
	}
	
	private function spiltUrl()
	{
		// the url will pass as a $_GET['url']. the process is done by 
		// the .htaccess file.
		// TODO: create .htaccess file and add rule. 
		if(isset($_GET['url']))
		{
			// echo $_GET['url'];
			
			// Trim the last '/' from the url
			// so the http://example.com/sample/ will be http://example.com/sample
			$url = rtrim($_GET['url'], '/');
			
			$url = filter_var($url, FILTER_SANITIZE_URL);
			
			$url = explode('/', $url);
			
			// Put URL parts into the appropiate properties.
			$this->url_controller 	= (isset($url[0])) ? $url[0] : null; 
			$this->url_action		= (isset($url[1])) ? $url[1] : null;
			$this->url_parameter_1	= (isset($url[2])) ? $url[2] : null;
			$this->url_parameter_2	= (isset($url[3])) ? $url[3] : null;
			$this->url_parameter_3	= (isset($url[4])) ? $url[4] : null;
		}
	}
	
}