<?php
/**
 * Car model used for connecting and extracting data from our database
 */
class CarModel {
    /**
     * Used to get all data from selected table
     * @return type Returns all colums from database
     */
     public static function getAll() {
        $SQL = 'SELECT * FROM car ORDER BY registration ASC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }
    
    /**
     * Returns only 1 selected row based on id
     * @param type $id Id of car witch data we want to get
     * @return type Return single car based on given id
     */
    public static function getById($id) {
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Returns Proizvodjac name based on name we give it
     * @param type $proizvodjac Return based on Proizvodjac name
     * @return type Return Proizvodjac
     */
    public static function getByProizvodjac($proizvodjac) {
        $SQL = 'SELECT * FROM car WHERE proizvodjac = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$proizvodjac]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    /**
     * Add new car to database
     * @param type $user_id Id of user who is adding car
     * @param type $registration Registration number
     * @param type $godiste Godiste automobila
     * @param type $zapremina Zapremina automobila
     * @param type $fuel_id Id of fuel type
     * @param type $broj_vrata_id Id of door type
     * @param type $proizvodjac Proizvodjac name
     * @param type $model Model name
     * @return type execute by passing params.
     */
    public static function add($user_id, $registration, $godiste, $zapremina, $fuel_id, $broj_vrata_id, $proizvodjac, $model) {
        $SQL = 'INSERT INTO car (user_id, registration, godiste, zapremina, fuel_id, broj_vrat_id, proizvodjac, model) VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$user_id, $registration, $godiste, $zapremina, $fuel_id, $broj_vrata_id, $proizvodjac, $model]);    
    }
    
    /**
     * Editing current car based on car_id
     * @param type $car_id Id of user who is adding car
     * @param type $user_id Registration number
     * @param type $registration Car registartion
     * @param type $godiste Car year produced
     * @param type $zapremina Zapremina autombila
     * @param type $fuel_id Type of fuel
     * @param type $broj_vrata_id Type of door
     * @param type $proizvodjac Name of proizvodjac
     * @param type $model Name of model
     * @return type
     */
    public static function edit($car_id, $user_id, $registration, $godiste, $zapremina, $fuel_id, $broj_vrata_id, $proizvodjac, $model) {
        $SQL = 'UPDATE car SET user_id = ?, registration = ?, godiste = ?, zapremina = ?, fuel_id = ?, broj_vrat_id = ?, proizvodjac = ?, model = ? WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$user_id, $registration, $godiste, $zapremina, $fuel_id, $broj_vrata_id, $proizvodjac, $model, $car_id]);
    }
    
    /**
     * Delete selected car from databse
     * @param type $car_id Id of car to be deleted
     * @return type delete result
     */
    public static function delete($car_id) {
        $costumer_id = intval($car_id);
        $SQL = 'DELETE FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$car_id]);
    }
}
