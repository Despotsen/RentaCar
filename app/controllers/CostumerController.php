<?php
/**
 * Costumer model for work with costumer table from database
 */
class CostumerController extends Controller {
    
    /**
     * Sets title of costumer(index) browser window, 
     * put all costumer from database into variable $costumers,
     * then he put that values using set into 'costumers' to be used
     * by other part of application. 
     */   
    public function index() {
        $costumers = CostumerModel::getAll();
        $this->set('costumers', $costumers);
        $this->set('seo_title', 'Klijenti');
    }
    
    /**
     * This function is used for adding new costumer into database
     */
    public function add () {
        if ($_POST) {
              $this->set('seo_title', 'Add');
            
            if ($_POST) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $driving_license_number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
                
                if (!preg_match("/^[0-9]{9}$/", $driving_license_number)) {
                    $this->set('message', 'Greska pri unosu vrednosti');                  
                } else {
                    $res = CostumerModel::add($name, $driving_license_number);                   
                    if ($res) {
                        Misc::redirect('costumers');
                    } else {
                        $this->set('message', 'Nije uspeo upis u bazu podataka');
                    }
                }
            } 
        }
    }
    
    /**
     * Edit currently selected costumer based on costumer_id
     * @param type $costumer_id Id of current costumer that we are editing
     */
    public function edit($costumer_id) {
        if ($_POST) {
            if ($_POST) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $driving_license_number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
                
                if (!preg_match("/^[0-9]{9}$/", $driving_license_number)) {
                    $this->set('message', 'Greska pri unosu vrednosti');
                } else {
                    $res = CostumerModel::edit($costumer_id, $name, $driving_license_number);                   
                    if ($res) {
                        Misc::redirect('costumers');
                    } else {
                        $this->set('message', 'Nije uspeo upis u bazu podataka');
                    }
                }
            } 
        }
        $costumer = CostumerModel::getById($costumer_id);
        $this->set('costumer', $costumer);
        $this->set('seo_title', 'Edit');
    }
    
    /**
     * Delete currently selected costumer from database
     * @param type $costumer_id Id of costumer that we are deliting
     */
    public function delete($costumer_id) {
        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            
            if ($confirmed == 1) {
                $res = CostumerModel::delete($costumer_id);
                if ($res) {
                    Misc::redirect('costumers');
                } else {
                    $this->set('message', 'Nije uspelo brisanje klijenta');
                }
            }
        }
        
        $costumer = CostumerModel::getById($costumer_id);
        
        $this->set('costumer', $costumer);
        $this->set('seo_title', 'Delete');
    }

}
