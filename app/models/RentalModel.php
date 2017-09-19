<?php

/**
 * Class to work with our renting car
 */
class RentalModel {
    public static function getAll() {
        $SQL = 'SELECT * FROM rental ORDER BY end_date ASC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

/**
 * Select id of us renting car
 * @param type $id Id of rental 
 * @return type 
 */
    public static function getById($id) {
        $SQL = 'SELECT * FROM rental WHERE rental_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

/**
 * Renting car
 * @param type $costumer_id Id of costumer we are renting car
 * @param type $car_id Id of car we are renting
 * @param type $user_id Id of user who is renting
 * @param type $end_date Date of transaction
 * @return type
 */    
    public  static function add($costumer_id, $car_id, $user_id, $end_date) {       
        $SQL = 'INSERT INTO rental (costumer_id, car_id, user_id, start_date, end_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$costumer_id, $car_id, $user_id, $end_date]);    
    
    }
}
