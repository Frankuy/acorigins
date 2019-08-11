<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\HelperController;

class WeaponsController extends Controller
{
    public $section = 'Weapons';
    public $melee_category = ['Dual Sword', 'Heavy Blade', 'Heavy Blunt', 'Regular Sword', 'Scepter', 'Sickle Sword', 'Spear'];
    public $ranged_category = ['Hunter Bow', 'Light Bow', 'Predator Bow', 'Warrior Bow'];

    public function index($type) {
        if ($type == 'melee') {
            return $this->meleeIndex();
        }
        else if ($type == 'ranged') {
            return $this->rangedIndex();
        } 
        else if ($type == 'shield') {
            return $this->shieldIndex();
        }
        return '404 Not Found';
    }

    //HANDLE REQUEST MELEE WEAPONS
    public function meleeIndex() {
        $title = 'Melee Weapons';

        return view('layout', [
            'title' => $title,
            'section' => $this->section,
            'category' => $this->melee_category
        ]);
    }

    //HANDLE REQUEST RANGED WEAPONS
    public function rangedIndex() {
        $title = 'Ranged Weapons';

        return view('layout', [
            'title' => $title,
            'section' => $this->section,
            'category' => $this->ranged_category
        ]);
    }

    //HANDLE REQUEST SHIELD WEAPONS
    public function shieldIndex() {
        $title = 'Shields';

        return view('layout', [
            'title' => $title,
            'section' => $this->section,
            'category' => []
        ]);
    }

    //HANDLE SHOW ALL MELEE WEAPONS
    public function showTable($type, $query = '') {
        $page = Input::get("page") !== null ? Input::get("page") : 1;
        $category = Input::get("category") !== null ? Input::get("category") : '';
        $rarity = Input::get("rarity") !== null ? Input::get("rarity") : '';
        $owned = Input::get("owned") !== null  ? Input::get("owned") : '';

        //SUPAYA GA RUSAK
        if ($page < 1) {
            $page = 1;
        }

        $data = [];
        if ($type == 'melee') {
            $title = 'Melee Weapons';
            $data = DB::table('gears')
                ->whereIn('category', $this->melee_category)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->offset(($page-1)*10)
                ->orderBy('name')
                ->limit(10)
                ->get();

            $countData = DB::table('gears')
                ->whereIn('category', $this->melee_category)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->count();

            $max_pages = ceil($countData/10);
        }
        else if ($type == 'ranged') {
            $title = 'Ranged Weapons';
            $data = DB::table('gears')
                ->whereIn('category', $this->ranged_category)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->offset(($page-1)*10)
                ->orderBy('name')
                ->limit(10)
                ->get();  
            
            $countData = DB::table('gears')
                ->whereIn('category', $this->ranged_category)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->count();

            $max_pages = ceil($countData/10);
        }
        else if ($type == 'shield') {
            $title = 'Shields';
            $data = DB::table('gears')
                ->where('category', '=', 'Shield')
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->offset(($page-1)*10)
                ->orderBy('name')
                ->limit(10)
                ->get();

            $countData = DB::table('gears')
                ->where('category', '=', 'Shield')
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('category', 'LIKE', '%'.$category.'%')
                ->where('rarity', 'LIKE', '%'.$rarity.'%')
                ->where('owned', 'LIKE', '%'.$owned.'%')
                ->count();

            $max_pages = ceil($countData/10);  
        }
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
            'type' => $type
        ]);
    }
}
