<?php

/**
 * Car Controller for work with car database and its manipulation
 */
class CarController extends Controller {

    /**
     * Sets title of car(index) browser window, 
     * put all cars from database into variable $cars,
     * then he put that values using set into 'cars' to be used
     * by other part of application. 
     */    
    public function index() {
        $this->set('seo_title', 'Vozila');
        $cars = CarModel::getAll();
        $this->set('cars', $cars);
    }
    
    /**
     * Adds new car into out data base,
     * sets title of add browser page,
     */
    public function add() {
        $fuel = FuelModel::getAll();
        $this->set('fuels', $fuel);
        $doors = DoorModel::getAll();
        $this->set('doors', $doors);
        $this->set('seo_title', 'Add');
        
        if ($_POST) {
            
            $proizvodjac = filter_input(INPUT_POST, 'prozivodjac', FILTER_SANITIZE_STRING);
            $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
            $registracija = filter_input(INPUT_POST, 'registracija');
            $zapremina = filter_input(INPUT_POST, 'zapremina');
            $tipgoriva = filter_input(INPUT_POST, 'gorivo');           
            $broVrata = intval(filter_input(INPUT_POST, 'vrata'));
            $proizvodnja = filter_input(INPUT_POST, 'proizvodnja');
            
            $tip = FuelModel::getByTip($tipgoriva);
            $vrata = DoorModel::getByVrata($broVrata);  
            
            $res = CarModel::add($_SESSION['user_id'], $registracija, $proizvodnja, $zapremina, $tip->fuel_id, $vrata->broj_vrata_id, $proizvodjac, $model);
                    
            if($res) {                 
                Misc::redirect('cars');
                       } else {
                $this->set('message', 'Doslo je do greske prilikom upisa u bazu');              
            }
        }
    }
    
    /**
     * Function that is used for editing car witch is selected using his car_id
     * @param type $car_id Id of current car that we are editing
     */
    public function edit($car_id) {
        
        $fuel = FuelModel::getAll();
        $this->set('fuels', $fuel);
        $doors = DoorModel::getAll();
        $this->set('doors', $doors);
        $car = CarModel::getById($car_id);
        $this->set('car', $car);
        $this->set('seo_title','Edit');
        
        if ($_POST) {
            
//            error_log(print_r($_POST));
            $proizvodjac = filter_input(INPUT_POST, 'prozivodjac');
            $model = filter_input(INPUT_POST, 'model');
            $registracija = filter_input(INPUT_POST, 'registracija');
            $zapremina = filter_input(INPUT_POST, 'zapremina');
            $tipgoriva = filter_input(INPUT_POST, 'gorivo');           
            $broVrata = intval(filter_input(INPUT_POST, 'vrata'));
            $proizvodnja = filter_input(INPUT_POST, 'proizvodnja');
            
            $tip = FuelModel::getByTip($tipgoriva);
            $vrata = DoorModel::getByVrata($broVrata);  
            
          //  $res = CarModel::edit($car_id, $_SESSION['user_id'], $registracija, $proizvodnja, $zapremina, $tip->fuel_id, $vrata->broj_vrata_id, $proizvodjac, $model);    
            $res = CarModel::edit($car_id, $_SESSION['user_id'], $registracija, $proizvodnja, $zapremina, $tipgoriva, $broVrata, $proizvodjac, $model);
            if($res) {
                Misc::redirect('cars');
            } else {
                $this->set('message', 'Greska');
            }
                 
        }       
    }
    
    /**
     * Function tat is used for delete of current car with is seleced using
     * his car_id.
     * @param type $car_id Id of car that will be deleted.
     */
    public function delete($car_id) {
        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            
            if ($confirmed == 1) {
                $res = CarModel::delete($car_id);
                if ($res) {
                    Misc::redirect('cars');
                } else {
                    $this->set('message', 'Nije uspelo brisanje vozila');
                }
            }
        }
        
        $car = CarModel::getById($car_id);
        
        $this->set('cars', $car);
        $this->set('seo_title','Delete');
    }

}