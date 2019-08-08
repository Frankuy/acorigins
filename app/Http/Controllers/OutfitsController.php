<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\HelperController;

class OutfitsController extends Controller
{
    public function index() {
        $title = 'Outfits';

        return view('layout', [
            'title' => $title,
            'section' => $title
        ]);
    }

    public function showTable($query = '') {
        $page = Input::get("page") !== null ? Input::get("page") : 1;
        //SUPAYA GA RUSAK
        if ($page < 1) {
            $page = 1;
        }

        $data = [];
        $title = 'Outfits';
        $data = DB::table('gears')
            ->where('category', '=', 'Outfit')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->offset(($page-1)*10)
            ->orderBy('name')
            ->limit(10)
            ->get();

        $countData = DB::table('gears')
            ->where('category', '=', 'Outfit')
            ->where('name', 'LIKE', '%'.$query.'%')
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
            'type' => 'outfits'
        ]);
    }
}
