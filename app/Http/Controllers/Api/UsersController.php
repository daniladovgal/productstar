<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Lessons;
use App\Models\Complete;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __invoke($id=null) {
        $users_model = new Users();
        if (empty($id)) {
            $users = $users_model->all();
            return $users;
        } else {
            $user = $users_model->where('id',$id)->get();
            $user = DB::raw("SELECT * FROM users WHERE id=1");
            dd($user);
            return $user;
        }
    }
}
