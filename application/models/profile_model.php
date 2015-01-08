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
     * @param Database $db
     *                  Database connection object
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Get the profile info from the databse
     */
    public function getProfileInfo() {

        if(Session::get("full_name") == false) {

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

            if($query->rowCount() == 0) {
                return false;
            }

            $result =  $query->fetch();

            // set the session information from the collected information
            // from database
            Session::set("full_name", $result->full_name);
            Session::set("department", $result->department);
            Session::set("current_gpa", $result->current_gpa);
            Session::set("cgpa", $result->cgpa);
            Session::set("semester", $result->semester);
        }

    }

}