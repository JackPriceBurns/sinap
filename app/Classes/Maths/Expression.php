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

    public function minus(Term $term){
        array_merge($this->negativeTerms, [$term]);
        $this->clean();
        return $this;
    }

    private function clean()
    {
        $terms = array_merge($this->positiveTerms, $this->negativeTerms);
        $this->negativeTerms = empty($this->negativeTerms);
        $this->positiveTerms = empty($this->positiveTerms);
        $xTerms = [];
        $yTerms = [];
        foreach($terms as $term){
            array_merge(($term instanceof X) ? $xTerms : $yTerms, [(string) $term->getPower() => $term]);
        }
        foreach($xTerms as $terms){
            $term = (new X($terms[0]->getPower()))->setCoefficient(0);
            foreach($terms as $newTerm){
                $term += $newTerm;
            }
            if($term->getCoefficient() != 0){
                array_push(($term->getCoefficient() < 0) ? $this->negativeTerms : $this->positiveTerms, $term);
            }
        }
        foreach($yTerms as $terms){
            $term = (new Y($terms[0]->getPower()))->setCoefficient(0);
            foreach($terms as $newTerm){
                $term += $newTerm;
            }
            if($term->getCoefficient() != 0){
                array_push(($term->getCoefficient() < 0) ? $this->negativeTerms : $this->positiveTerms, $term);
            }
        }
    }
}