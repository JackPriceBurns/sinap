<?php

namespace App\Http\Controllers;

use App\Classes\Hash;
use App\Session;
use App\Setting;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ManageController extends Controller
{
    public function sessions(){

        $sessions = Session::get();

        return view();
    }

    public function students(Request $request, $args = null){

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
            } elseif($args[0] == 'addstudent') {
                if($request->isMethod('post')){
                    if(is_numeric($request->input('year'))){
                        if(((int) $request->input('year')) != 12 || ((int) $request->input('year')) != 13){
                            $user = new User();
                            $user->name = $request->input('name');
                            $user->email = $request->input('email');
                            $user->year = $request->input('year');
                            $user->role_id = Role::where('name', 'Student')->first()->id;
                            $hash = Hash::hash(Setting::where('key', 'default_password')->first()->value);
                            $user->password = $hash['hash'];
                            $user->password_salt = $hash['salt'];
                            $result = $user->save();

                            if($result){
                                redirect('manage/students');
                            } else {
                                redirect('manage/students?error=error adding user');
                            }

                        } else {
                            redirect('manage/students?error=year is not 12 or 13');
                        }
                    } else {
                        redirect('manage/students?error=year is not an integer');
                    }
                } else {
                    return redirect('manage/students?error=no post data');
                }
            }
        }

        $students = ['students' => User::where('role_id', Role::where('name', 'Student')->first()->id)->get()];

        return view('manage.students', $students);

    }
}
