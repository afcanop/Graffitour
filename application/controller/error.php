<?php

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Error extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        require APP . 'view/error/index.php';
        echo "<h1> página no encontrada </h1>";
        echo "<img src='http://www.raquelbegue.com/blog/wp-content/uploads/2014/01/404-charizard.jpg'/>";
    }
}
