<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Lessons;
use App\Models\Complete;


class FillController extends Controller
{
    protected $users_count = 2000;
    protected $lessons_count = 27;
    protected $admins = [1,123,666,1500];

    function __invoke(Request $req) {

        set_time_limit(99999999);

        $users = new Users();
        $complete = new Complete();
        for ($i=1; $i <= $this->users_count; $i++) { 
            $users->insert([
                'name' => 'User '.$i,
                'role' => 'student',
                'email' => 'student'.$i.'@jaba.com'
            ]);

            $existing = [];
            $ok = rand(1,20);
            $j=1;

            while ($j <= $ok) {
                $complete->insert([
                    'userid'=>$i,
                    'lessonid'=>$j
                ]);
                $j++;
            }
        }

        foreach ($this->admins AS $value) {
            $users->where('id', $value)
            ->update(['role' => 'admin']);
        }

        $lessons = new Lessons();
        for ($i=1; $i <= $this->lessons_count; $i++) { 
            $lessons->insert([
                'name' => 'Lesson '.$i,
            ]);
        }


    }
}
