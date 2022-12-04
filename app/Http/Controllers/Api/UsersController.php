<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __invoke(Request $request, $id=null) {
        if (empty($id)) {
            switch ($request->input('sort')) {
                default:
                case 'lessons':
                    $users = DB::select("SELECT users.id, users.name, users.email, users.role, count(complete.lessonid) AS complete FROM users LEFT JOIN complete ON complete.userid = users.id WHERE users.role = 'student' GROUP BY users.id ORDER BY count(complete.lessonid) DESC");
                break;
            }
            return $users;
        } else {
            $user = DB::select("SELECT users.id, users.name, users.email, users.role, count(complete.lessonid) AS complete FROM users LEFT JOIN complete ON complete.userid = users.id WHERE users.id = $id");

            $all_lessons = DB::select("SELECT count(id) AS count FROM lessons");

            $complete_lessons = DB::select("SELECT count(userid) AS count FROM complete GROUP BY lessonid");

            $users = DB::select("SELECT count(*) AS count FROM users WHERE role = 'student'");

            $rating = [1,$users[0]->count];

            if ($user[0]->complete == 0) {
                $rating[0] = $complete_lessons[0]->count;
            } else {
                foreach ($complete_lessons AS $key=>$value) {
                    if ($key == $user[0]->complete - 1) {
                        if (isset($complete_lessons[$key+1])) {
                            $rating[0] = $complete_lessons[$key+1]->count;
                        }
                        $rating[1] = $value->count;
                    }
                }
            }

            $user[0]->lessons = $all_lessons[0]->count;
            $user[0]->rating = implode('-',$rating);
            return $user;
        }
    }
}
