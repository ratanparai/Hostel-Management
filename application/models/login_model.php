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
	 * @param Database $db Dababase connection object
	 */
	public function __construct(Database $db)
	{
		$this->db = $db;
	}


	/**
	 * Login process.
	 * @return bool Success state
	 */
	public function login()
	{
		// check if username and password is passed in post. if not then return false
		// with session error message to be parsed later in template view
		if(!isset($_POST['username']) || empty($_POST['username'])) {
			$_SESSION['feedback_negative'][] = FEEDBACK_EMPTY_USERNAME;
			return false;
		}

		if(!isset($_POST['password']) || empty($_POST['password'])) {
			$_SESSION['feedback_negative'][] = FEEDBACK_EMPTY_PASSWORD;
			return false;
		}

		// prepare the query
		$sth = $this->db->prepare("SELECT	user_id,
								   	user_email,
								   	user_password_hash,
				 			FROM	users
							WHERE	user_name = :user_name");

		// execute the query
		$sth->execute(array(':user_name' => $_POST['username']));
		// check and save how many result produced after the execution of the query
		$count = $sth->rowCount();

		// if the query execution doesn't return 1 result then there is no user with this username
		if($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_NO_USER;
			return false;
		}

		$result = $sth->fetch();

		// check if the password hash match with the saved password hash
		if(password_verify($_POST['password'], $result->user_passwork_hash)) {
			$_SESSION['feedback_possitive'][] = FEEDBACK_LOGIN_SUCCESSFUL;
			return true;
		} else {
			$_SESSION['feedback_negative'][] = FEEDBACK_WRONG_PASSWORD;
			return false;
		}
	}

}