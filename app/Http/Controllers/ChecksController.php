<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class ChecksController extends Controller
{
    public function index($id) {
        $data = DB::table('checks')
            ->where('gear_id', $id)
            ->where('user_id', Cookie::get('user_id'))
            ->first();

        if ($data) {
            DB::table('checks')
            ->where('gear_id', $id)
            ->where('user_id', Cookie::get('user_id'))
            ->delete();
        }
        else {
            DB::table('checks')
            ->insert(
                ['gear_id' => $id, 'user_id' => Cookie::get('user_id'), 'owned' => true]
            );
        }
    }

    public function login(Request $request) {
        $user = DB::table('users')
            ->where('username', '=', $request->username)
            ->first();

        if (!$user) {
            return redirect('/login')->with('status', 'Username is not exist');
        }

        $decrypted = Crypt::decrypt($user->password);

        if ($request->password == $decrypted) {
            Cookie::queue(Cookie::make('user_id', $user->id, 480));
            Cookie::queue(Cookie::make('key', $user->username, 480));

            return redirect(route('weapons', 'melee'));
        }
        else {
            return redirect('/login')->with('status', 'Username or password is wrong');
        }
    }

    public function register(Request $request) {
        $username = DB::table('users')
            ->where('username', '=', $request->username)
            ->get();

        if (count($username) != 0) {
            return redirect('/register')->with('status', 'Username is already taken');
        }
        else {
            DB::table('users')->insert(
                [
                    'username' => $request->username,
                    'password' => Crypt::encrypt($request->password)
                ]
            );

            return redirect('/login');
        }
    }
}
