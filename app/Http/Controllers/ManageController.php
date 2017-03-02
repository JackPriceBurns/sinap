<?php

namespace App\Http\Controllers;

use App\Classes\Hash;
use App\Session;
use App\Setting;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function sessions(Request $request, $args = null){
        if($args !== null) {
            $args = explode('.', $args);
            if ($args[0] == 'delete') {
                if (isset($args[1])) {
                    $session_id = $args[1];
                    if($session_id == 'all'){
                        $user_id = $args[2];
                        if (is_numeric($user_id)) {
                            $sessions = Session::where('user_id', $user_id)->get();
                            foreach($sessions as $session){
                                $session->delete();
                            }
                        } else {
                            return redirect('/manage/sessions?error=user id not integer');
                        }
                    }
                    if (is_numeric($session_id)) {
                        $session = Session::find($session_id);
                        if ($session !== null) {
                            $session->delete();
                        } else {
                            return redirect('/manage/sessions?error=session does not exist');
                        }
                    } else {
                        return redirect('/manage/sessions?error=session id not integer');
                    }
                } else {
                    return redirect('/manage/sessions?error=no session id specified');
                }
            }
        }

        $packaged = [];

        $users = User::get();
        foreach($users as $user){
            array_push($packaged, ['user' => $user, 'sessions' => Session::where('user_id', $user->id)->get()]);
        }

        return view('manage.sessions', ['sessions' => $packaged]);
    }

    public function teachers(Request $request, $args = null){
        if($args !== null){
            $args = explode('.', $args);
            if($args[0] == 'delete'){
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){
                        $user = User::find($user_id);
                        if($user !== null){
                            $sessions = Session::where('user_id', $user->id)->get();
                            foreach($sessions as $session){
                                $session->delete();
                            }
                            $user->delete();
                        } else {
                            return redirect('/manage/teachers?error=user does not exist');
                        }
                    } else {
                        return redirect('/manage/teachers?error=user id not integer');
                    }

                } else {
                    return redirect('/manage/teachers?error=no user id specified');
                }
            } elseif($args[0] == 'addteacher') {
                if($request->isMethod('post')){

                    $user = new User();
                    $user->name = $request->input('name');
                    $user->email = $request->input('email');
                    $user->year = 'n/a';
                    $user->role_id = Role::where('name', 'Teacher')->first()->id;
                    $hash = Hash::hash(Setting::where('key', 'default_password')->first()->value);
                    $user->password = $hash['hash'];
                    $user->password_salt = $hash['salt'];
                    $result = $user->save();

                    if($result){
                        redirect('/manage/teachers');
                    } else {
                        redirect('/manage/teachers?error=error adding user');
                    }
                } else {
                    return redirect('/manage/teachers?error=no post data');
                }
            }
        }

        $teachers = ['teachers' => User::where('role_id', Role::where('name', 'Teacher')->first()->id)->get()];

        return view('manage.teachers', $teachers);

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
                            $sessions = Session::where('user_id', $user->id)->get();
                            foreach($sessions as $session){
                                $session->delete();
                            }
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
            }elseif($args[0] == 'addstudents') {
                if($request->isMethod('post')){
                    $names = explode(',', $request->input('names'));
                    $emails = explode(',', $request->input('emails'));
                    $years = explode(',', $request->input('years'));
                    //print_r($names);
                    //print_r($emails);
                    //print_r($years);
                    //exit();
                    if(count($names) == count($emails) && count($emails) == count($years)){
                        $x = 0;
                        $notAdded = [];
                        foreach($names as $name){

                            $email = $emails[$x];
                            $year = $years[$x];

                            if(is_numeric($year)){
                                if(((int) $year) == 12 || ((int) $year) == 13){
                                    $newUser = new User();
                                    $newUser->name = $name;
                                    $newUser->email = $email;
                                    $newUser->year = $year;
                                    $newUser->role_id = Role::where('name', 'Student')->first()->id;
                                    $hash = Hash::hash(Setting::where('key', 'default_password')->first()->value);
                                    $newUser->password = $hash['hash'];
                                    $newUser->password_salt = $hash['salt'];
                                    $result = $newUser->save();

                                    if(!$result){
                                        array_push($notAdded, 'failed adding ' . $name);
                                    }

                                } else {
                                    array_push($notAdded, 'failed adding ' . $name. ': year is not 13 or 12');
                                }
                            } else {
                                array_push($notAdded, 'failed adding ' . $name. ': year is not integer');
                            }

                            $x = $x + 1;
                        }

                        if(count($notAdded) > 0){
                            return redirect('manage/students?error=' . implode('<br />', $notAdded));
                        } else {
                            return redirect('manage/students/');
                        }
                    } else {
                        return redirect('manage/students?error=different amount of names, emails or years');
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
