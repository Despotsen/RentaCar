<?php
/**
 * Load Class based on its name and check then return us result in form of
 * controller etc
 * @param type $className Class name with he check to see and find
 * @throws Exception Error if do not find selected class
 */
function __autoload($className) {
    if ($className == 'Configuration') {
        require_once $className . '.php';
    } elseif (in_array($className, ['Controller', 'AdminController', 'ApiController', 'DataBase', 'Misc', 'Session'])) {
        require_once 'sys/' . $className . '.php';
    } elseif (preg_match('/^([A-Z][a-z]+)+Controller$/', $className)) {
        $fileName = 'app/controllers/' . $className . '.php';
        if (file_exists($fileName)) {
            require_once $fileName;
        } else {
            throw new Exception('Controller file ' .$className. ' does not exist.');
        }
    } elseif (preg_match('/^([A-Z][a-z]+)+Model$/', $className)) {
        $fileName = 'app/models/' . $className . '.php';
        if (file_exists($fileName)) {
            require_once $fileName;
        } else {
            throw new Exception('Model file ' . $className . ' does not exist.');
        }
    }
}
