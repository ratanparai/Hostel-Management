<?php

/**
 * Class ProfileModel
 * This class will do havy lifting of profile information from database to
 * controller.
 * @author Ratan
 *
 */
class ProfileModel
{

    /**
     * Get and save the database connection that is passed
     *
     * @param Database $db
     *            Database connection object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Get the profile info from the databse
     */
    public function getProfileInfo()
    {
        if (Session::get("full_name") == false) {

            $sql = "SELECT  full_name,
                            department,
                            current_gpa,
                            cgpa,
                            semester
                        FROM
                            student_info
                        WHERE
                            id = :id";

            $query = $this->db->prepare($sql);

            $query->execute(array(
                ":id" => Session::get("user_id")
            ));

            if ($query->rowCount() == 0) {
                return false;
            }

            $result = $query->fetch();

            // set the session information from the collected information
            // from database
            Session::set("full_name", $result->full_name);
            Session::set("department", $result->department);
            Session::set("current_gpa", $result->current_gpa);
            Session::set("cgpa", $result->cgpa);
            Session::set("semester", $result->semester);
        }
    }

    public function updateAccount()
    {
        $fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
        if (empty($_POST['email'])) {
            $_SESSION['feedback_negative']['message'] = FEEDBACK_EMPTY_EMAIL;
            $_SESSION['feedback_negative']['code'] = FEEDBACK_EMPTY_EMAIL_CODE;
        } elseif (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['feedback_negative']['message'] = FEEDBACK_INVALID_EMAIL;
            $_SESSION['feedback_negative']['code'] = FEEDBACK_INVALID_EMAIL_CODE;
        } else {

            $email = $_POST['email'];

            /**
             * Check if the user info is already in student_info table or not
             */

            $sql = 'SELECT * FROM student_info WHERE id = :user_id';
            $query = $this->db->prepare($sql);
            $query->execute( array(
                ':user_id' => Session::get('user_id')
            ));

            if($query->rowCount() == 0) {

                $sql = 'INSERT INTO student_info (id, full_name) VALUES (:id, :full_name)';
                $query = $this->db->prepare($sql);
                $query->execute( array(
                    ':id' => Session::get('user_id'),
                    ':full_name' => $fullName
                ));

            } else {
                $sql = 'UPDATE student_info SET full_name = :full_name WHERE id = :user_id';
                $query = $this->db->prepare($sql);
                $query->execute( array(
                    ':full_name' => $fullName,
                    ':user_id' => Session::get("user_id")
                ));
            }



            // update email
            $sql = 'UPDATE users SET user_email = :email WHERE user_id = :user_id';
            $query = $this->db->prepare($sql);
            $query->execute(array(
                ':email' => $email,
                ':user_id' => Session::get("user_id")
            ));

            // set session data
            Session::set('full_name', $fullName);
            Session::set('user_email', $email);

            $_SESSION['feedback_possitive']['message'] = FEEDBACK_ACCOUNT_UPDATED;
            $_SESSION['feedback_possitive']['code'] = FEEDBACK_ACCOUnT_UPDATED_CODE;

            return true;
        }

        return false;
    }
}