<?php

    require_once __DIR__ . "/BrandModel.php";

    class ElectronicProduct{

        use BrandModel;

        public $display;

        public $ram;

        public $rom;

        public $price;

        public function __construct($_brand, $_model, $_ram){

            $this->brand = $_brand;
            $this->model = $_model;
            

            if(is_int($_ram)){

                $this->ram = $_ram;

            } else{

                throw new Exception("Valore Ram non numerico");

            }

        }

    }

?>