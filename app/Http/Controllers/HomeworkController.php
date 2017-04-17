<?php

namespace App\Http\Controllers;

use App\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index(){

    }

    public function homework($arguments = null){

        if(!is_numeric($arguments)){
            return redirect('/?error=homework not found');
        }

        $homework = Homework::find($arguments);

        if($homework === null){
            return redirect('/?error=homework not found');
        }

        return view('homework.homework', ['homework' => $homework]);
    }
}
