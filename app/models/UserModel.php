<?php
/**
 * Class for work with users from our database
 */
class UserModel {
    /**
     * Select all users from databse
     * @return type all users
     */ 
    public static function getAll() {
        $SQL = 'SELECT * FROM user;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Select only 1 user
     * @param type $id id of user we are selected
     * @return type 1 user
     */
    public static function getById($id) {
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Return username based on login parameter
     * @param type $username Username
     * @param type $passwordHash Hash of our password to be checked
     * @return type username and pass
     */
    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `password` = ? AND active = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
}
