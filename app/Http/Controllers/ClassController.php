<?php

namespace App\Http\Controllers;

use App\Classroom;

class ClassController extends Controller
{
    public function index(){
        return view('class.index');
    }

    public function classroom($arguments = null){

        if(!is_numeric($arguments)){
            return redirect('class?error=class id is not numeric');
        }

        $classroom = Classroom::find($arguments);

        if($classroom === null){
            return redirect('class?error=class does not exist');
        }

        return view('class.class', ['classroom' => $classroom]);
    }

    public function homework($arguments = null){

        if(!is_numeric($arguments)){
            return redirect('class?error=class id is not numeric');
        }

        $classroom = Classroom::find($arguments);

        if($classroom === null){
            return redirect('class?error=class does not exist');
        }

        return view('class.homework', ['classroom' => $classroom]);
    }
}
