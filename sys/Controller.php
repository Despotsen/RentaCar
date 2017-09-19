<?php
    /**
     * Abastrack class with other class must implement its methods
     */
    abstract class Controller {
        private $podaci = [];
        
        /**
         * Storde data to be used by others pars of our app
         * @param string $name Name of varibale we will store our data
         * @param type $value  Value to be stored
         */
        protected function set(string $name, $value) {
            if (preg_match('|^[A-z0-9_]+$|', $name)) {
                $this->podaci[$name] = $value;
            }
        }
        
        /**
         * 
         * @return type Returns data
         */
        public function getData() {
            return $this->podaci;
        }
        
        /**
         * Not used
         */
        function index() {
            
        }
        
        /**
         * Not used
         */
        public function __pre() {
            
        }
    }
