<?php
/**
 * Class for work with fuel type from databse
 */
class FuelModel {
    /**
     * Returns all fuel types from databse
     * @return type of fuel
     */
     public static function getAll() {
        $SQL = 'SELECT * FROM fuel;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Return one fuel type from databse
     * @param type $id
     * @return type of fuel based on its id
     */
    public static function getById($id) {
        $SQL = 'SELECT * FROM fuel WHERE fuel_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Get fuel based on its name
     * @param type $tip Name of fuel type
     * @return type of fuel based on tis name
     */
    public static function getByTip($tip) {        
        $SQL = 'SELECT * FROM fuel WHERE tip = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$tip]);
        if ($res){
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {           
            return null;
        }
    }
    
    /**
     * Returns id of fuel type based on its name
     * @param type $tip Name
     * @return type id of fuel
     */
    public static function getIdByTip($tip) {        
        $SQL = 'SELECT fuel_id FROM fuel WHERE tip = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$tip]);
        if ($res){
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {           
            return null;
        }
    }
}
