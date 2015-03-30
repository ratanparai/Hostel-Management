<?php
/**
 * UserModel
 * Handles all the PUBLIC profile stuff. This is not for getting data of the logged in user, it's more for handling
 * data of all the other users. Useful for display profile information, creating user lists etc.
 */
class UserModel
{
    /**
     * Gets an array that contains all the users in the database. The array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     *
     * @return array The profiles of all users
     */
    public static function getPublicProfilesOfAllUsers(Database $db)
    {
        $sql = "SELECT user_id, user_name, user_email, user_password_hash, first_time FROM users";
        $query = $db->prepare($sql);
        $query->execute();

        $all_users_profiles = array();

        foreach ($query->fetchAll() as $user) {
            $all_users_profiles[$user->user_id] = new stdClass();
            $all_users_profiles[$user->user_id]->user_id = $user->user_id;
            $all_users_profiles[$user->user_id]->user_name = $user->user_name;
            $all_users_profiles[$user->user_id]->user_email = $user->user_email;

            if($user->first_time == 1) {
                $all_users_profiles[$user->user_id]->user_password = $user->user_password_hash;
            } else {
                $all_users_profiles[$user->user_id]->user_password = '*****';
            }
        }

        return $all_users_profiles;

    }


}
