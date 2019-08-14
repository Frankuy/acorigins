<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checks')->delete();

        if ($fh = fopen(__DIR__.'/Check.txt', 'r')) {
            while (!feof($fh)) {
                $line = fgets($fh);
                $sword = explode(',', $line);
                $id = $sword[0];
                $name = $sword[1];
                $owned = $sword[4];

                if ($name == 'Lucius') {
                    $name .= ', '.$sword[2];
                    $owned = $sword[5];
                }

                $owned = str_replace("\n", "", $owned);

                if (!strpos($name, 'dup')) {
                    $this->command->info(var_dump($owned));
                    if ($owned == "1") {
                        $this->command->info('test: '.var_dump($owned));
                        DB::table('checks')
                            ->insert(
                                [
                                    'user_id' => 1,
                                    'gear_id' => $id,
                                    'owned' => true 
                                ]
                        );
                    }
                }
            }
            fclose($fh);
        }
    }
}
