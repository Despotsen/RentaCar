<?php

/**
 * Controller for work with renting cars
 */
class RentalController extends Controller {
    /**
     * Index function witch is used to get data from base and set title of 
     * browser window also put that data into variable
     */
    public function index() {
        $this->set('seo_title', 'Rent a car');
        $res = RentalModel::getAll();
        $this->set('rez', $res);
  
    }
    
    /**
     * Renting car to costumer and ask for data from database to see costumers
     * from list also same go for cars
     */
    public function add() {
        $korisnici = CostumerModel::getAll();
        $this->set('korisnici', $korisnici);
        $vozila = CarModel::getAll();
        $this->set('vozila', $vozila);
        $this->set('seo_title', 'Rent a car');
        
        if ($_POST) {
            $korisnik = filter_input(INPUT_POST, 'korisnik');
            $vozilo = filter_input(INPUT_POST, 'vozila');
            $datum = filter_input(INPUT_POST, 'datum');
            
            $costumer = CostumerModel::getByName($korisnik);
            $car = CarModel::getByProizvodjac($vozilo);
            
           $res = RentalModel::add($costumer->costumer_id, $car->car_id, $_SESSION['user_id'], $datum);
           
           
           if($res) {
                Misc::redirect('rental');
            } else {
                $this->set('message', 'Greska');
            }
        }
    }
}
