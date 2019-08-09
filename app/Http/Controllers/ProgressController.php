<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProgressController extends Controller
{
    public function index() {
        $melee = [];
        $melee_length = 0;
        $melee_done = 0;

        //DUAL SWORD
        $dual_sword_length = DB::table('gears')
            ->where('category', 'Dual Sword')
            ->count();
        $dual_sword_done = DB::table('gears')
            ->where('category', 'Dual Sword')
            ->where('owned', 1)
            ->count();
        $melee_length += $dual_sword_length;
        $melee_done += $dual_sword_done;
        $melee[] = [
            'name' => 'Dual Sword',
            'length' => $dual_sword_length,
            'done' => $dual_sword_done
        ];

        //HEAVY BLADE
        $heavy_blade_length = DB::table('gears')
            ->where('category', 'Heavy Blade')
            ->count();
        $heavy_blade_done = DB::table('gears')
            ->where('category', 'Heavy Blade')
            ->where('owned', 1)
            ->count();
        $melee_length += $heavy_blade_length;
        $melee_done += $heavy_blade_done;
        $melee[] = [
            'name' => 'Heavy Blade',
            'length' => $heavy_blade_length,
            'done' => $heavy_blade_done
        ];

        //HEAVY BLUNT
        $heavy_blunt_length = DB::table('gears')
            ->where('category', 'Heavy Blunt')
            ->count();
        $heavy_blunt_done = DB::table('gears')
            ->where('category', 'Heavy Blunt')
            ->where('owned', 1)
            ->count();
        $melee_length += $heavy_blunt_length;
        $melee_done += $heavy_blunt_done;
        $melee[] = [
            'name' => 'Heavy Blunt',
            'length' => $heavy_blunt_length,
            'done' => $heavy_blunt_done
        ];

        //Regular Sword
        $regular_sword_length = DB::table('gears')
            ->where('category', 'Regular Sword')
            ->count();
        $regular_sword_done = DB::table('gears')
            ->where('category', 'Regular Sword')
            ->where('owned', 1)
            ->count();
        $melee_length += $regular_sword_length;
        $melee_done += $regular_sword_done;
        $melee[] = [
            'name' => 'Regular Sword',
            'length' => $regular_sword_length,
            'done' => $regular_sword_done
        ];

        //Scepter
        $scepter_length = DB::table('gears')
            ->where('category', 'Scepter')
            ->count();
        $scepter_done = DB::table('gears')
            ->where('category', 'Scepter')
            ->where('owned', 1)
            ->count();
        $melee_length += $scepter_length;
        $melee_done += $scepter_done;
        $melee[] = [
            'name' => 'Scepter',
            'length' => $scepter_length,
            'done' => $scepter_done
        ];

        //Sickle Sword
        $sickle_sword_length = DB::table('gears')
            ->where('category', 'Sickle Sword')
            ->count();
        $sickle_sword_done = DB::table('gears')
            ->where('category', 'Sickle Sword')
            ->where('owned', 1)
            ->count();
        $melee_length += $sickle_sword_length;
        $melee_done += $sickle_sword_done;
        $melee[] = [
            'name' => 'Sickle Sword',
            'length' => $sickle_sword_length,
            'done' => $sickle_sword_done
        ];

        //Spear
        $spear_length = DB::table('gears')
            ->where('category', 'Spear')
            ->count();
        $spear_done = DB::table('gears')
            ->where('category', 'Spear')
            ->where('owned', 1)
            ->count();
        $melee_length += $spear_length;
        $melee_done += $spear_done;
        $melee[] = [
            'name' => 'Spear',
            'length' => $spear_length,
            'done' => $spear_done
        ];

        $ranged = [];
        $ranged_length = 0;
        $ranged_done = 0;

        //Hunter Bow
        $hunter_bow_length = DB::table('gears')
            ->where('category', 'Hunter Bow')
            ->count();
        $hunter_bow_done = DB::table('gears')
            ->where('category', 'Hunter Bow')
            ->where('owned', 1)
            ->count();
        $ranged_length += $hunter_bow_length;
        $ranged_done += $hunter_bow_done;
        $ranged[] = [
            'name' => 'Hunter Bow',
            'length' => $hunter_bow_length,
            'done' => $hunter_bow_done
        ];

        //Predator Bow
        $predator_bow_length = DB::table('gears')
            ->where('category', 'Predator Bow')
            ->count();
        $predator_bow_done = DB::table('gears')
            ->where('category', 'Predator Bow')
            ->where('owned', 1)
            ->count();
        $ranged_length += $predator_bow_length;
        $ranged_done += $predator_bow_done;
        $ranged[] = [
            'name' => 'Predator Bow',
            'length' => $predator_bow_length,
            'done' => $predator_bow_done
        ];

        //Light Bow
        $light_bow_length = DB::table('gears')
            ->where('category', 'Light Bow')
            ->count();
        $light_bow_done = DB::table('gears')
            ->where('category', 'Light Bow')
            ->where('owned', 1)
            ->count();
        $ranged_length += $light_bow_length;
        $ranged_done += $light_bow_done;
        $ranged[] = [
            'name' => 'Light Bow',
            'length' => $light_bow_length,
            'done' => $light_bow_done
        ];

        //Warrior Bow
        $warrior_bow_length = DB::table('gears')
            ->where('category', 'Warrior Bow')
            ->count();
        $warrior_bow_done = DB::table('gears')
            ->where('category', 'Warrior Bow')
            ->where('owned', 1)
            ->count();
        $ranged_length += $warrior_bow_length;
        $ranged_done += $warrior_bow_done;
        $ranged[] = [
            'name' => 'Warrior Bow',
            'length' => $warrior_bow_length,
            'done' => $warrior_bow_done
        ];

        //Shield
        $shield_length = DB::table('gears')
            ->where('category', 'Shield')
            ->count();
        $shield_done = DB::table('gears')
            ->where('category', 'Shield')
            ->where('owned', 1)
            ->count();

        //Outfit
        $outfit_length = DB::table('gears')
            ->where('category', 'Outfit')
            ->count();
        $outfit_done = DB::table('gears')
            ->where('category', 'Outfit')
            ->where('owned', 1)
            ->count();

        //Mount
        $mount_length = DB::table('gears')
            ->where('category', 'Mount')
            ->count();
        $mount_done = DB::table('gears')
            ->where('category', 'Mount')
            ->where('owned', 1)
            ->count();

        return view('progress', [
            'melee' => $melee,
            'melee_length' => $melee_length,
            'melee_done' => $melee_done,
            'ranged' => $ranged,
            'ranged_length' => $ranged_length,
            'ranged_done' => $ranged_done,
            'shield_length' => $shield_length,
            'shield_done' => $shield_done,
            'outfit_length' => $outfit_length,
            'outfit_done' => $outfit_done,
            'mount_length' => $mount_length,
            'mount_done' => $mount_done
        ]);
    }
}
