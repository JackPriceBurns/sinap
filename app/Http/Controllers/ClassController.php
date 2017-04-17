<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use App\Classroom;

class ClassController extends Controller
{
    public function index(){
        return view('class.index');
    }

    public function classroom($arguments = null) {
        return $this->load('class', $arguments);
    }

    public function homework($arguments = null) {
        return $this->load('homework', $arguments);
    }

    public function stats($arguments = null) {
        return $this->load('stats', $arguments);
    }

    private function load($blade, $arguments){

        if(!is_numeric($arguments)){
            return redirect('class?error=class id is not numeric');
        }

        $classroom = Classroom::find($arguments);

        if($classroom === null){
            return redirect('class?error=class does not exist');
        }

        if(!$this->authorized($classroom)){
            return redirect('class?error=you\'re not allowed to view this');
        }

        return view('class.' . $blade, ['classroom' => $classroom]);
    }

    private function authorized(Classroom $classroom) : bool {

        $user = Auth::get();

        if(Auth::is('Teacher') || Auth::is('Admin')){
            return true;
        }

        if($classroom->students->search(function($item, $key) use ($user) {
            return $item->id === $user->id;
        }) === 0) return true;

        return false;
    }
}
