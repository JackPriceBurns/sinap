<?php

namespace App\Http\Controllers;

use App\Classes\Maths\Expression;
use App\Classes\Maths\Terms\X;
use Illuminate\Http\Request;
use App\Classes\Auth;

class OverviewController extends Controller
{
    public function overview(){

        $expression = new Expression();
        $expression->add((new X(2))->setCoefficient(1));
        $expression->minus((new X(1))->setCoefficient(4));
        $expression->add((new X(0))->setCoefficient(4));

        //exit($expression->getReadable());

        return view('pages.overview');

    }
}
