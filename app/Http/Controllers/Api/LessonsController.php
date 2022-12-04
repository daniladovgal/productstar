<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    public function __invoke(Request $request) {

        $lessons = DB::select("SELECT lessonid,lessons.name,count(userid) AS complete FROM complete JOIN lessons ON lessons.id = lessonid GROUP BY lessonid ORDER BY count(lessonid) DESC");
        return $lessons;
        
    }
}