<?php 

    class ElectronicProduct{

        public $brand;

        public $model;

        public $display;

        public $ram;

        public $rom;

        public $price;

        public function __construct($_brand, $_model){

            $this->brand = $_brand;
            $this->model = $_model;

        }

    }

?>