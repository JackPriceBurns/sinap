<?php

namespace App\Classes\Maths;

class Term
{
    private $power = null;
    private $coefficient = 1;

    public function __construct($power)
    {
        $this->power = $power;
    }

    public function getPower(){
        return $this->power;
    }

    public function setPower($newPower){
        $this->power = $newPower;
        return $this;
    }

    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    public function setCoefficient($newCoefficient){
        $this->coefficient = $newCoefficient;
        return $this;
    }

    public function add(Term $term){
        if($this->power !== $term->getPower()){
            throw new \Exception("Power's are not the same!");
        }
        $this->coefficient += $term->getCoefficient();
        return $this;
    }
}