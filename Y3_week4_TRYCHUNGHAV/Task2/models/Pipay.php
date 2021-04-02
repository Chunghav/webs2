<?php

require_once ( __DIR__ . '/../interface/display.php');

class Pipay implements display {

    public function __construct (
        protected float $price,
        protected float $quantity) {
        
    }

    public function price(){
        return $this-> price;
    }

    public function quantity(){
        return $this-> quantity;
    }
    
    public function total(){
        return $this-> price * $this->quantity; 
    }

    public function method(){
        return 'Pipay';
    }

}

