<?php
    /**
     * Sets constants to be used for database class connection
     */
    abstract class Configuration {
        const DB_HOST = 'localhost';
        const DB_NAME = 'projekat';
        const DB_USER = 'root';
        const DB_PASS = 'pedja';

        const BASE_PATH = '/PresekDva/';
        const BASE_URL = 'http://localhost' . Configuration::BASE_PATH;
        
        const USER_SALT = 'dkjlsjklphdjh2pu12h3uh12i3';
    }
