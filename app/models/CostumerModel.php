<?php

/**
 * Model for work with costumer
 */
class CostumerModel {
    /**
     * Select all costumers from database
     * @return type PDO Object
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM costumer;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Select only 1 costumer from database
     * @param type $id ID of costumer we want to get
     * @return type PDO Object
     */
    public static function getById($id) {
        $SQL = 'SELECT * FROM costumer WHERE costumer_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Add new costumer in database
     * @param type $name Name of costumer we are adding
     * @param type $drivning_license_number Driving license of costumer
     * @return type PDO object
     */
    public static function add($name, $drivning_license_number) {
        $SQL = 'INSERT INTO costumer (name, driving_license_number) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $drivning_license_number]);    
    }
    
    /**
     * Returns costumer based on name
     * @param type $name Name of Costumer we want to see
     * @return type PDO Object
     */
    public static function getByName($name) {
        $SQL = 'SELECT * FROM costumer WHERE name = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$name]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Edit currently costumer from databse
     * @param type $costumer_id Costumer id
     * @param type $name name of Costumer
     * @param type $driving_license_number Costumer dl number
     * @return type row we get based on valuse we provide it
     */
    public static function edit($costumer_id, $name, $driving_license_number) {
        $SQL = 'UPDATE costumer SET name = ?, driving_license_number=? WHERE costumer_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name, $driving_license_number, $costumer_id]);
      
    }
    
    /**
     * Delete costumer based on its id
     * @param type $costumer_id Id of costumer
     * @return type costumer to be deleted
     */
    public static function delete($costumer_id) {
        $costumer_id = intval($costumer_id);
        $SQL = 'DELETE FROM costumer WHERE costumer_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$costumer_id]);
    }
}

