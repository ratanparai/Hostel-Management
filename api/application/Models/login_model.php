<?php

/**
 * class LoginModel
 * This class will do the heavy lifting from database for our project
 * for any type of login related task
 */
class LoginModel
{

    /**
     * Get and save the database connection that was passed
     *
     * @param Database $db
     *            Dababase connection object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Login process.
     *
     * @return bool Success state
     */
    public function login()
    {
        // check if username and password is passed in post. if not then return false
        // with session error message to be parsed later in template view
        if (! isset($_POST['username']) || empty($_POST['username'])) {
            $_SESSION['feedback_negative']['message'] = FEEDBACK_EMPTY_USERNAME;
            $_SESSION['feedback_negative']['code'] = FEEDBACK_EMPTY_USERNAME_CODE;
            return false;
        }
        
        if (! isset($_POST['password']) || empty($_POST['password'])) {
            $_SESSION['feedback_negative']['message'] = FEEDBACK_EMPTY_PASSWORD;
            $_SESSION['feedback_negative']['code'] = FEEDBACK_EMPTY_PASSWORD_CODE;
            return false;
        }
        
        // prepare the query
        $sth = $this->db->prepare("SELECT	user_id,
								   	user_email,
								   	user_password_hash,
                                    first_time
				 			FROM	users
							WHERE	user_name = :user_name");
        
        // execute the query
        $sth->execute(array(
            ':user_name' => $_POST['username']
        ));
        // check and save how many result produced after the execution of the query
        $count = $sth->rowCount();
        
        // if the query execution doesn't return 1 result then there is no user
        // with this username
        if ($count != 1) {
            $_SESSION['feedback_negative']['message'] = FEEDBACK_NO_USER;
            $_SESSION['feedback_negative']['code'] = FEEDBACK_NO_USER_CODE;
            return false;
        }
        
        $result = $sth->fetch();
        
        // debug
        // echo $result->user_password_hash;
        
        // check if the user is loging in for the first time
        if ($result->first_time) {
            // check if the password matched
            if ($_POST['password'] === $result->user_password_hash) {
                $_SESSION['feedback_possitive']['message'] = FEEDBACK_LOGIN_SUCCESSFUL;
                $_SESSION['feedback_possitive']['code'] = FEEDBACK_LOGIN_SUCCESSFUL_CODE;
                return true;
            } else {
                $_SESSION['feedback_negative']['message'] = FEEDBACK_WRONG_PASSWORD;
                $_SESSION['feedback_negative']['code'] = FEEDBACK_WRONG_PASSWORD_CODE;
                return false;
            }
            // user already changed the default generated password
        } else {
            // check if the password hash match with the saved password hash
            if (password_verify($_POST['password'], $result->user_passwork_hash)) {
                $_SESSION['feedback_possitive']['message'] = FEEDBACK_LOGIN_SUCCESSFUL;
                $_SESSION['feedback_possitive']['code'] = FEEDBACK_LOGIN_SUCCESSFUL_CODE;
                return true;
            } else {
                $_SESSION['feedback_negative']['message'] = FEEDBACK_WRONG_PASSWORD;
                $_SESSION['feedback_negative']['code'] = FEEDBACK_WRONG_PASSWORD_CODE;
                return false;
            }
        }
    }

    /**
     * create new user and return true if user created successful.
     * if not then
     * return false.
     *
     * @return boolean Is the user account created?
     */
    public function registerNewUser()
    {
        // perform all necessary form checks
        if (empty($_POST['username'])) {
            $_SESSION['feedback_negative'][] = FEEDBACK_EMPTY_USERNAME;
        } elseif (! preg_match("/([a-zA-Z)(\d{6})$/i", $_POST['username'])) {
            $_SESSION['feedback_negative'][] = FEEDBACK_INVALID_USERNAME;
        } elseif (empty($_POST['email'])) {
            $_SESSION['feedback_negative'][] = FEEDBACK_EMPTY_EMAIL;
        } elseif (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['feedback_negative'][] = FEEDBACK_INVALID_EMAIL;
        } else {
            // clean the input and make the first later capital like c to C
            $username = ucfirst(strip_tags($_POST['username']));
            $email = strip_tags($_POST['email']);
            
            // Generate 5 digit integer password for the first time login and
            // compute its hash value
            $password = Generate::generateDefaultPassword();
            
            // Do not need to hash the password for first time use
            // So that the password can be changed from database
            // if needed then uncomment the line.
            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            // write new user data into database
            $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                    VALUES (:username, :password, :email)";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                ':username' => $username,
                ':password' => $password,
                ':email' => $email
            ));
            
            if ($query->rowCount() != 1) {
                $_SESSION['feedback_negative'][] = FEEDBACK_ACCOUNT_CREATING_FAILED;
                return false;
            }
            
            $_SESSION['feedback_possitive'][] = FEEDBACK_ACCOUNT_CREATED;
            return true;
        }
        
        // default return false
        return false;
    }
}
