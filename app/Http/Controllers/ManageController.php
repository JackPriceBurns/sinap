<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function sessions(){

        $sessions = Session::get();

        return view();
    }

    public function students($args = null){

        if($args !== null){
            $args = explode('.', $args);
            if($args[0] == 'delete'){
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){
                        $user = User::find($user_id);
                        if($user !== null){
                            $user->delete();
                        } else {
                            return redirect('manage/students?error=user does not exist');
                        }
                    } else {
                        return redirect('manage/students?error=user id not integer');
                    }

                } else {
                    return redirect('manage/students?error=no user id specified');
                }


            } elseif($args[0] == 'increase') {
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){
                        $user = User::find($user_id);
                        if($user !== null){
                            if($user->year == 13){
                                return redirect('manage/students?error=user cannot be greater than year 13');
                            } else {
                                $user->year = (string)(((int)$user->year) + 1);
                                $user->save();
                            }
                        } else {
                            return redirect('manage/students?error=user does not exist');
                        }
                    } else {
                        return redirect('manage/students?error=user id not integer');
                    }

                } else {
                    return redirect('manage/students?error=no user id specified');
                }
            } elseif($args[0] == 'decrease') {
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){
                        $user = User::find($user_id);
                        if($user !== null){
                            if($user->year == 12){
                                return redirect('manage/students?error=user cannot be smaller than year 12');
                            } else {
                                $user->year = (string)(((int)$user->year) - 1);
                                $user->save();
                            }
                        } else {
                            return redirect('manage/students?error=user does not exist');
                        }
                    } else {
                        return redirect('manage/students?error=user id not integer');
                    }

                } else {
                    return redirect('manage/students?error=no user id specified');
                }
            }
        }

        $students = ['students' => User::where('role_id', Role::where('name', 'Student')->first()->id)->get()];

        return view('manage.students', $students);

    }
}
