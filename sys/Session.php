<?php

/**
 * Class for work with session
 */
class Session {
    
    /**
     * Start session
     */
    public static function begin() {
        session_start();
    }
    
    /**
     * End session
     */
    public static function end() {
        self::clean();
        session_destroy();
    }
    
    /**
     * CLeas session to make it empty
     */
    public static function clean() {
        $_SESSION = [];
    }
    
    /**
     * Checking if current key is valid for session
     * @param string $keyName Key name to be check
     * @return type name of key
     */
    public static function isValid(string $keyName) {
        return preg_match('/^[a-z][a-z0-9_]*$/', $keyName);
    }
    
    /**
     * Check if key exists
     * @param string $keyName key to be checked if existing
     * @return boolean Return result of check 
     */
    public static function exists(string $keyName) {
        if (self::isValid($keyName)) {
            return isset($_SESSION[$keyName]);
        } else {
            return false;
        }
    }

    /**
     * Set key on value
     * @param string $keyName Key
     * @param type $value Value 
     */
    public static function set(string $keyName, $value) {
        if (self::isValid($keyName)) {
            $_SESSION[$keyName] = $value;
        }
    }

    /**
     * 
     * @param string $keyName
     * @param type $default or default if not find others
     * @return type return key name of session
     */
    public static function get(string $keyName, $default = '') {
        if (self::isValid($keyName) and self::exists($keyName)) {
            return $_SESSION[$keyName];
        } else {
            return $default;
        }
    }
    
    /**
     * Delete Key
     * @param string $keyName Key to be deleted
     */
    public static function delete(string $keyName) {
        if (self::isValid($keyName) and self::exists($keyName)) {
            unset($_SESSION[$keyName]);
        }
    }
}
