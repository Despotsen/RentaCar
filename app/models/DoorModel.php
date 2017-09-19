<?php

/**
 * Model used to get data from door table from databse
 */
class DoorModel {
    /**
     * Return all door types
     * @return type doors 
     */
   public static function getAll() {
        $SQL = 'SELECT * FROM broj_vrata;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Return specific door type based on id
     * @param type $id Id of door type
     * @return type
     */
    public static function getById($id) {
        $SQL = 'SELECT * FROM broj_vrata WHERE broj_vrata = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Return vrata
     * @param type $vrata Return id based on vrata
     * @return type
     */
    public static function getByVrata($vrata) {
        $SQL = 'SELECT * FROM broj_vrata WHERE number = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$vrata]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
}
