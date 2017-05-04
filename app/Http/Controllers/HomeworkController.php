<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use App\Homework;
use App\Submit;
use Carbon\Carbon;

class HomeworkController extends Controller
{
    public function index(){

        $classes = Auth::get()->classes;
        $submitted_homework = Submit::where(['user_id' => Auth::get()->id, 'marked' => false])->get();
        $due_homework = [];
        $overdue_homework = [];

        foreach($classes as $class){
            foreach($class->homework as $homework){

                

                if((new Carbon($homework->due))->greaterThan(new Carbon())){
                    array_push($due_homework, $homework);
                } else {
                    array_push($overdue_homework, $homework);
                }
            }
        }

        return view('homework.index', ['due_homework' => $due_homework, 'submitted_homework' => $submitted_homework]);
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

    public function submit($arguments){

        if(!is_numeric($arguments)){
            return redirect('/?error=homework not found');
        }

        $homework = Homework::find($arguments);

        if($homework === null){
            return redirect('/?error=homework not found');
        }

        $answers = [];
        $marking_required = false;
        $total = 0;
        $score = 0;

        foreach($homework->questions as $question){
            foreach($question->parts as $part){
                $total++;
                if($part->requires_marking){
                    $marking_required = true;
                }

                if(isset($_POST['answer:'.$question->id.':'.$part->id]) && $_POST['answer:'.$question->id.':'.$part->id] != "" && $_POST['answer:'.$question->id.':'.$part->id] != null){
                    if($_POST['answer:'.$question->id.':'.$part->id] == $part->answer){
                        $score++;
                        array_push($answers, [$part->id, $_POST['answer:'.$question->id.':'.$part->id], true]);
                    } else {
                        array_push($answers, [$part->id, $_POST['answer:'.$question->id.':'.$part->id], false]);
                    }
                } else {
                    array_push($answers, [$part->id, "", false]);
                }
            }
        }

        if($total = $score){
            $marking_required = false;
        }

        $submit = new Submit();

        $submit->homework_id = $homework->id;
        $submit->user_id = Auth::get()->id;
        $submit->answers = json_encode($answers);

        if(!$marking_required){
            $submit->score = round(($score/$total)*100);
            $submit->needs_marking = false;
            $submit->marked = true;
        } else {
            $submit->needs_marking = true;
            $submit->marked = false;
        }

        $submit->submitted = new Carbon();
        $submit->save();

        return redirect('/homework/'.$homework->id.'/submitted');
    }

    public function submitted($arguments){

        if(!is_numeric($arguments)){
            return redirect('/?error=homework not found');
        }

        $homework = Homework::find($arguments);

        if($homework === null){
            return redirect('/?error=homework not found');
        }

        return view('homework.submitted', ['homework' => $homework]);
    }
}
