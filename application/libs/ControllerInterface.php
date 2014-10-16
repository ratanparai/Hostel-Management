<?php

/**
 * Interface ControllerInterface
 *
 * Every controller need to implement this interface
 */
interface ControllerInterface
{
    
    // every webpage should have it's own index page.
    public function index();
}