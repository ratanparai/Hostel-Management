<?php

/**
 * Session class
 *
 * handles the session stuff. Creates session when no one exits, set and
 * get values, and closes the session properly (=logout). Those methods
 * are STATIC, which means we can call them with Session::get(XX)
 */
class Session
{

    /**
     * start the session
     */
    public static function init()
    {
        // if no session exits, start the session
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * sets a specific value to a specific key of the session
     *
     * @param mixed $key            
     * @param mixed $value            
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * gets/return the value of a specific key of the session
     *
     * @param mixed $key
     *            Usally a string.
     * @return mixed Value of the session $key
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        session_destroy();
    }
}
