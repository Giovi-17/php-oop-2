<?php 

    class User{

        public $name;

        public $lastname;

        public $email;

        public $age;

        protected $basket = [];

        public function __construct($_name, $_lastname, $_email){

            $this->name = $_name;
            $this->lastname = $_lastname;
            $this->email = $_email;

        }

        public function getAddProduct($product){

            $this->basket[] = $product;

        }

        public function getBasket(){

            return $this->basket;

        }

        public function getFullName(){

            return $this->name . " " . $this->lastname;

        }

    }

?>