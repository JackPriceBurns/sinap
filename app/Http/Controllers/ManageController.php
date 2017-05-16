<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Classes\Auth;
use App\Classes\Hash;
use App\Classroom;
use App\Homework;
use App\Part;
use App\Question;
use App\Role;
use App\Session;
use App\Setting;
use App\Subject;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function badges(Request $request, $args = null){

        if($args !== null){
            $args = explode('.', $args);
            if($args[0] == 'delete'){
                if(isset($args[1])){
                    $badge_id = $args[1];
                    if(is_numeric($badge_id)){
                        $badge = Badge::find($badge_id);
                        if($badge !== null){
                            $badge->delete();
                        } else {
                            return redirect('manage/badges?error=badge does not exist');
                        }
                    } else {
                        return redirect('manage/badges?error=badge id not integer');
                    }

                } else {
                    return redirect('manage/badges?error=no badge id specified');
                }

            } elseif($args[0] == 'addbadge') {
                if($request->isMethod('post')){

                    $colours = ['warning', 'primary', 'info', 'danger', 'success', 'default'];

                    if(!in_array($request->input('colour'), $colours)){
                        redirect('manage/badges?error=colour is not valid');
                    }

                    $badge = new Badge();
                    $badge->name = $request->input('badge');
                    $badge->colour = $request->input('colour');
                    $badge->user_id = (int) $request->input('user_id');
                    $badge->save();

                } else {
                    return redirect('manage/badges?error=no post data');
                }
            }
        }

        $users = User::orderBy('name', 'asc')->get();
        $badges = Badge::get();

        return view('manage.badges', compact('users', 'badges'));
    }

    public function sessions($args = null){
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

        $sessions = collect([]);

        $users = User::orderBy('name', 'asc')->get();
        $sessions_db = Session::get();
        foreach($users as $user){
            $sessions->push(['user' => $user, 'sessions' => $sessions_db->where('user_id', $user->id)]);
        }

        return view('manage.sessions', compact('sessions'));
    }

    public function teachers(Request $request, $args = null){
        if($args !== null){
            $args = explode('.', $args);
            if($args[0] == 'delete'){
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){
                        $user = User::find($user_id);

                        if($user->role_id !== Role::where('name', 'Teacher')->first()->id)
                            return redirect('manage/teachers?error=user is not teacher');

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


        $teachers = Role::where('name', 'Teacher')->first()->users->sortBy('name');

        return view('manage.teachers', compact('teachers'));
    }

    public function students(Request $request, $args = null){

        if($args !== null){
            $args = explode('.', $args);
            if($args[0] == 'delete'){
                if(isset($args[1])){
                    $user_id = $args[1];
                    if(is_numeric($user_id)){

                        $user = User::find($user_id);

                        if($user->role_id !== Role::where('name', 'Student')->first()->id)
                            return redirect('manage/students?error=user is not student');

                        if($user === null)
                            return redirect('manage/students?error=user does not exist');

                        $sessions = Session::where('user_id', $user->id)->get();
                        foreach($sessions as $session){
                            $session->delete();
                        }
                        $user->delete();

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
                    if(count($names) == count($emails) && count($emails) == count($years)){
                        $x = 0;
                        $notAdded = [];
                        foreach($names as $name){

                            $email = $emails[$x];
                            $year = $years[$x];

                            if(is_numeric($year)){
                                if(((int) $year) == 12 || ((int) $year) == 13){

                                    $user = User::where('email', $email)->first();

                                    if($user !== null){
                                        array_push($notAdded, 'user ' . $name . ' already exists');
                                    } else {
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

        $students = Role::where('name', 'Student')->first()->users->sortBy('name');

        return view('manage.students', compact('students'));

    }

    public function questions()
    {
        return view('manage.questions', ['questions' => Question::get()]);
    }

    public function classes(Request $request, $args = null){
        if($request->isMethod('post')){
            if($args == "addclass"){
                if($request->input('name') != "" && $request->input('subjects') != ""){

                    $name = $request->input('name');
                    $subject = Subject::find($request->input('subjects'));

                    if($subject === null){
                        return redirect('manage/classes?error=subject not found');
                    }

                    $classroom = new Classroom();
                    $classroom->name = $name;
                    $classroom->subject_id = $subject->id;
                    $classroom->teacher_id = Auth::get()->id;
                    $classroom->save();

                } else {
                    return redirect('manage/classes?error=name and subject must be set');
                }
            } else if($args == "addstudent") {
                if($request->input('names') != "" && $request->input('class_id') != ""){

                    $classroom = Classroom::find($request->input('class_id'));
                    $emails = explode(",", $request->input('names'));
                    $emails = array_map(function($email){ return trim($email); }, $emails);

                    if($classroom === null){
                        return redirect('manage/classes?error=class not found');
                    }

                    foreach($emails as $email){
                        if($email != "" && $email != null){
                            $user = User::where('email', $email)->first();
                            if($user === null){
                                return redirect('manage/classes?error=user not found ' . $email);
                            }
                            $classroom->students()->attach($user->id);
                        }

                    }

                }  else {
                    return redirect('manage/classes?error=name must be set');
                }
            }
        }
        if($args !== null){
            if(explode('.', $args)[0] == "delete"){
                if(is_numeric(explode('.', $args)[1])){
                    $classroom = Classroom::find(explode('.', $args)[1]);
                    if($classroom === null){
                        return redirect('manage/classes?error=class not found');
                    }
                    $classroom->delete();
                } else {
                    return redirect('manage/classes?error=class id not numeric');
                }
            }
        }

        return view('manage.classes', ['classrooms' => Classroom::get()]);
    }

    public function submitQuestion(Request $request){

        if(!is_numeric($request->input('parts'))){
            return redirect('manage/questions?error=parts is not numeric');
        }

        if($request->input('parts') < 1){
            return redirect('manage/questions?error=you need to add at least 1 part');
        }

        $question = new Question();
        $question->context = ($request->input('question-context') == null) ? "blank" : $request->input('question-context');
        $question->difficulty = 50;
        $question->save();

        for($x = 0; $x < $request->input('parts'); $x++){
            $part = new Part();
            $part->type = ($request->input('type:' . ($x+1)) == 'ma') ? 'mp' : 'a';
            $part->question_id = $question->id;
            $part->question = $request->input('part-question-' . ($x+1));
            $part->answer = $request->input('answer:' . ($x+1));
            $part->tip = "N/A";
            $part->order = $x+1;
            $part->save();
        }

        foreach(explode(" ", $request->input('tags')) as $tag_name){

            $tag = Tag::where('tag', $tag_name)->first();

            if($tag === null){
                $tag = new Tag();
                $tag->tag = $tag_name;
                $tag->save();
            }

            $question->tags()->attach($tag);
        }

        return redirect('manage/questions/' . $question->id . '/submitted');
    }

    public function submittedQuestion($args){

        if(!is_numeric($args)){
            return redirect('manage/questions?error=question id not numeric');
        }

        $question = Question::find($args);

        if($question === null){
            return redirect('manage/questions?error=question not found');
        }

        return view('manage.question_submitted', compact('question'));
    }

    public function homework($args = null){

        if($args != null){

            $args = explode(".", $args);

            if($args[0] == "delete"){

                if (is_numeric($args[1])) {

                    $homework = Homework::find($args[1]);

                    if ($homework === null) {
                        return redirect('manage/homework?error=homework not found');
                    }

                    $homework->delete();
                } else {
                    return redirect('manage/homework?error=homework id not numeric');
                }

            }

            if($args[0] == "edit"){

                if(is_numeric($args[1])){

                    $homework = Homework::find($args[1]);

                    if($homework === null){
                        return redirect('manage/homework?error=homework not found');
                    }

                    $questions = Question::get();

                    return view('manage.edit_homework', ['homework' => $homework, 'questions' => $questions]);

                } else {
                    return redirect('manage/homework?error=homework id not numeric');
                }

            }

        }

        return view('manage.homework', ['homework' => Homework::get()]);

    }
}
