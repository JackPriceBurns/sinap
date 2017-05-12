<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use App\Classroom;
use App\News;
use Illuminate\Http\Request;

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

        $scores = [];

        foreach($classroom->students as $student){
            if(count($student->submitted) > 0){
                array_push($scores, $student->submitted->sortByDesc('score')->first());
            }

        }

        //echo(json_encode($scores));
        //exit();

        return view('class.' . $blade, ['classroom' => $classroom, 'scores'=>$scores]);
    }

    private function authorized(Classroom $classroom) : bool {

        $user = Auth::get();

        if(Auth::is('Teacher') || Auth::is('Admin')){
            return true;
        }

        foreach($classroom->students as $student){
            if($student->id == $user->id) return true;
        }

        return false;
    }

    public function post(Request $request, $args){

        $classroom = Classroom::find($args);

        if($classroom === null){
            return redirect('class?error=class not found');
        }

        if($request->input('title') == null || $request->input('body') == null){
            return redirect('class?error=no body or title set');
        }

        $news = new News();
        $news->posted_by = Auth::get()->id;
        $news->link = $request->input('link');
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->icon = "pencil";
        $news->dashboard = "false";
        $news->save();

        $classroom->news()->attach($news);

        return redirect('/class/' . $classroom->id);

    }
}
