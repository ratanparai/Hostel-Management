<?php
/**
 * This page in only used for testing purpose of our web application.
 */
echo Generate::generateDefaultPassword();

if(preg_match("/([a-zA-Z])(\d{6})$/i", "C093503")) {
    echo "Valid id";
} else {
    echo "inValid ID";
}
