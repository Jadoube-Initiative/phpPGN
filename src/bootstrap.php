<?php

/**
 * Function to load classes automatically based on namespaces
 * WARNING: The folder structure in which classes are stored must match with namespacing pattern
 * Example:
 * \my\namespaced\PersonalClass must be a class declared in the following folder: app/lib/my/namespaced/PersonalClass.php
 * @param string $class
 * 
 * Notice: A check on file_exists before include_once must be done in future -
 * there is a bug concerning require_once on phpunit autoload which means that 
 * if this check is done than an error would occur on executing tests
 * @see http://stackoverflow.com/questions/20769745/phpunit-failed-opening-required-phpunit-extensions-story-testcase-php
 */
spl_autoload_register(
        function ($class) {
            $lib = dirname(__FILE__);
            $fileName = $lib . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            include_once $fileName;
        }
);
