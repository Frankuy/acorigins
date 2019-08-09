<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\HelperController;

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
        //SUPAYA GA RUSAK
        if ($page < 1) {
            $page = 1;
        }

        $data = [];
        $title = 'Mounts';
        $data = DB::table('gears')
            ->where('category', '=', 'Mount')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->where('rarity', 'LIKE', '%'.$rarity.'%')
            ->offset(($page-1)*10)
            ->orderBy('name')
            ->limit(10)
            ->get();

        $countData = DB::table('gears')
            ->where('category', '=', 'Mount')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->where('rarity', 'LIKE', '%'.$rarity.'%')
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
