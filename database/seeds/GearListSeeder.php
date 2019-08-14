<?php

use Illuminate\Database\Seeder;
use App\Gear;

class GearListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gears')->delete();
        // $this->command->info(__DIR__);

        //INSERT DATA
        if ($fh = fopen(__DIR__.'/Gear.txt', 'r')) {
            while (!feof($fh)) {
                $line = fgets($fh);
                $sword = explode(',', $line);
                $name = $sword[0];
                $rarity = $sword[1];
                $category = $sword[2];

                if ($name == 'Lucius') {
                    $name .= ', '.$sword[1];
                    $rarity = $sword[2];
                    $category = $sword[3];
                }

                $category = str_replace("\r\n", "", $category);

                if (!strpos($name, 'dup')) {
                    $gear = new Gear();
                    $gear->name = $name;
                    $gear->rarity = $rarity;
                    $gear->category = $category;
                    $gear->save();

                    $this->command->info($gear["name"]. ' | '. $gear["rarity"]. ' | '. $gear["category"]);
                }
            }
            fclose($fh);
        }
    }
}
