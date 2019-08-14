<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Cookie;

class MountsController extends Controller
{
    public function index() {
        $title = 'Mounts';

        return view('layout', [
            'title' => $title,
            'section' => $title,
            'category' => []
        ]);
    }

    public function showTable($query = '') {
        $page = Input::get("page") !== null ? Input::get("page") : 1;
        $rarity = Input::get("rarity") !== null ? Input::get("rarity") : '';
        $owned = Input::get("owned") !== null ? Input::get("owned") : '';

        $check_user = DB::table('checks')
            ->select('user_id', 'gear_id', 'owned')
            ->where('user_id', Cookie::get('user_id'));
        //SUPAYA GA RUSAK
        if ($page < 1) {
            $page = 1;
        }

        $data = [];
        $title = 'Mounts';
        $data = DB::table('gears')
            ->select(DB::raw('id, name, rarity, category, COALESCE(owned) as owned'))
            ->leftJoinSub($check_user, 'check_user', function ($join) {
                $join->on('gears.id', '=', 'check_user.gear_id');
            })
            ->where('category', '=', 'Mount')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->where('rarity', 'LIKE', '%'.$rarity.'%')
            ->when($owned, function($query) use ($owned) {
                if ($owned == 'true') {
                    return $query->whereNotNull('owned');
                }
                else if ($owned == 'false') {
                    return $query->whereNull('owned');
                }
            })
            ->offset(($page-1)*10)
            ->orderBy('name')
            ->limit(10)
            ->get();

        $countData = DB::table('gears')
            ->select(DB::raw('id, name, rarity, category, COALESCE(owned) as owned'))
            ->leftJoinSub($check_user, 'check_user', function ($join) {
                $join->on('gears.id', '=', 'check_user.gear_id');
            })
            ->where('category', '=', 'Mount')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->where('rarity', 'LIKE', '%'.$rarity.'%')
            ->when($owned, function($query) use ($owned) {
                if ($owned == 'true') {
                    return $query->whereNotNull('owned');
                }
                else if ($owned == 'false') {
                    return $query->whereNull('owned');
                }
            })
            ->count();

        $max_pages = ceil($countData/10);

        //SUPAYA GA RUSAK
        if ($page > $max_pages) {
            $page = $max_pages;
        }

        $format_pages = HelperController::paginate($page, $max_pages);

        return view('table', [
            'title' => $title,
            'data' => $data,
            'query' => $query,
            'page' => $page,
            'pages' => $max_pages,
            'formatPages' => $format_pages,
            'type' => 'mounts'
        ]);
    }
}
