<?php

namespace App\Classes\Maths;

use App\Classes\Maths\Terms\X;
use App\Classes\Maths\Terms\Y;

class Expression
{
    private $positiveTerms = [];
    private $negativeTerms = [];

    public function __construct()
    {

    }

    public function add(Term $term){
        array_push($this->positiveTerms, $term);
        $this->clean();
        return $this;
    }

    private function clean()
    {
        $xPowers = [];
        $yPowers = [];
        foreach(array_merge($this->positiveTerms, $this->negativeTerms) as $term){
            if($term instanceof X){
                if(!isset($xPowers[(String)$term->getPower()])) $xPowers[(String)$term->getPower()] = [];
                array_push($xPowers[(String)$term->getPower()], $term);
            } else if($term instanceof Y) {
                if(!isset($yPowers[(String)$term->getPower()])) $yPowers[(String)$term->getPower()] = [];
                array_push($yPowers[(String)$term->getPower()], $term);
            } else {
                throw new \Exception('Unrecognised Term');
            }
        }

        $this->negativeTerms = $this->positiveTerms = [];

        foreach($xPowers as $terms){
            $xTerm = new X($terms[0]->getPower());
            $xTerm->setCoefficient(0);

            foreach($terms as $newTerm) $xTerm->add($newTerm);

            if($xTerm->getCoefficient() != 0){
                if($xTerm->getCoefficient() < 0){
                    array_push($this->negativeTerms, $xTerm);
                } else {
                    array_push($this->positiveTerms, $xTerm);
                }
            }
        }
        foreach($yPowers as $terms){
            $yTerm = new Y($terms[0]->getPower());
            $yTerm->setCoefficient(0);

            foreach($terms as $newTerm) $yTerm->add($newTerm);

            if($yTerm->getCoefficient() != 0){
                if ($yTerm->getCoefficient() < 0) {
                    array_push($this->negativeTerms, $yTerm);
                } else {
                    array_push($this->positiveTerms, $yTerm);
                }
            }
        }
    }

    public function minus(Term $term)
    {
        array_push($this->negativeTerms, $term);
        $this->clean();

        return $this;
    }

    public function getReadable(){

        if(empty($this->negativeTerms) && empty($this->positiveTerms)) return "0";

        echo '<pre>';

        print_r($this->negativeTerms);
        print_r($this->positiveTerms);

        echo '</pre>';

        $output = "";

        $x = 0;
        foreach($this->positiveTerms as $positiveTerm){
            $x++;
            $output .= ($positiveTerm->getCoefficient() !== 1) ? $positiveTerm->getCoefficient() : "";
            $output .= ($positiveTerm->getPower() !== 0) ? (($positiveTerm instanceof X) ? "X" : "Y") : "";
            $output .= ($positiveTerm->getPower() !== 0) ? (($positiveTerm->getPower() !== 1) ? "^" . $positiveTerm->getPower() : "") : "";
            $output .= ($x != count($this->positiveTerms)) ? " + " : "";
        }
        $x = 0;
        foreach($this->negativeTerms as $negativeTerm){
            $x++;
            $output .= ($negativeTerm->getCoefficient() !== 1) ? $negativeTerm->getCoefficient() : "";
            $output .= ($negativeTerm->getPower() !== 0) ? (($negativeTerm instanceof X) ? "X" : "Y") : "";
            $output .= ($negativeTerm->getPower() !== 0) ? (($negativeTerm->getPower() !== 1) ? "^" . $negativeTerm->getPower() : "") : "";
            $output .= ($x != count($this->negativeTerms)) ? " - " : "";
        }

        return $output;

    }
}