<?php

/**
 * Static class that hold all of the function used to generate random
 * number , OAuth token, secreate etc.
 *
 * @author Ratan
 *
 */
class Generate
{

    /**
     * This function generate random number for the first time password that
     * will be handed to the border when they admit to the hostel for the
     * first time.
     *
     * @param number $length            
     * @return integer $password randomly generated password
     */
    public static function generateDefaultPassword($length = 5)
    {
        $password = '';
        for ($i = 1; $i <= $length; $i ++) {
            $password .= rand(1, 9);
        }
        
        return $password;
    }
}
