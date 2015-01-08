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
        try {
            $this->db = new Database();
        } catch (PDOException $e) {
            die('Database connection could not be established.');
        }
        
        // create a view object (that does nothing, but provide the view render() method)
        // we are gonna use this view object to create veiw
        // TODO: clearify documentation
        $this->view = new View();
    }

    /**
     * Load's the model with the given name
     *
     * @param string $name
     *            Name of the model, first letter capital
     * @return object Newly created model object
     */
    public function loadModel($name)
    {
        $path = MODELS_PATH . strtolower($name) . '_model.php';
        
        if (file_exists($path)) {
            // include the model
            require $path;
            
            /**
             * All model class name is like "ExampleModel"
             */
            $modelName = ucfirst(strtolower($name)) . 'Model';
            
            // return the new model object while passing the database connection to the model
            return new $modelName($this->db);
        }
    }

    /**
     * Sample output to json formate .
     *
     *
     *
     *
     * This is still in test mode. need more work
     *
     * @return string
     */
    public function generateJsonFeedback()
    {
        $feedback = array();
        
        // if there is any negative feedback avaiable
        if ($_SESSION['feedback_negative'] != null) {
            $feedback[] = array(
                "message" => $_SESSION['feedback_negative']['message'],
                "code" => $_SESSION['feedback_negative']['code']
            );
            
            $return = array(
                "errors" => $feedback
            );
            
            $_SESSION['feedback_negative'] = null;
            
            return json_encode($return);
        } else {
            
            $feedback[] = array(
                "message" => $_SESSION['feedback_possitive']['message'],
                "code" => $_SESSION['feedback_possitive']['code']
            );
            
            $return = array(
                "success" => $feedback
            );
            
            $_SESSION['feedback_possitive'] = null;
            
            return json_encode($return);
        }
    }
}
