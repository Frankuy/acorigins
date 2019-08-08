<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cookie;

class ChecksController extends Controller
{
    public function index($id) {
        $owned = DB::table('gears')
            ->where('id', $id)
            ->value('owned');

        DB::table('gears')
            ->where('id', $id)
            ->update(['owned' => !$owned]);
    }

    public function login(Request $request) {
        if ($request->username == 'f' && $request->password == 'f') {
            Cookie::queue(Cookie::make('username', 'f', 480));

            return redirect(route('weapons', 'melee'));
        }
        else {
            return redirect('/login');
        }
    }
}
