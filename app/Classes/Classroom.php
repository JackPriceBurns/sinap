<?php
/**
 * Created by PhpStorm.
 * User: jackprice-burns
 * Date: 04/03/2017
 * Time: 13:46
 */

namespace App\Classes;

use App\Classroom as EloquentClassroom;


class Classroom
{

    public static function get(){

        $classesAttending = [];

        $user = Auth::get();
        $classes = EloquentClassroom::orderBy('name', 'asc')->get();
        foreach($classes as $class){
            $students = explode(',', $class->students);
            foreach($students as $student_id){
                if ($user->id == $student_id){
                    array_push($classesAttending, $class);
                }
                break;
            }
            break;
        }

        return $classesAttending;
    }


}