<?php

use Illuminate\Database\Seeder;


class reviewsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {

        for ($j = 1; $j < 24; $j++) {
            $limit = mt_rand(1, 10);
            for ($k = 1; $k < $limit; $k++) {
                $reviewParts = array("I ", "liked ", "this ", "a ", "lot ", "! ", "<3 ", "XoXo ", "10/10 ", "would do it again! ", ". ", "Best service eva! ");
                $desc = "";
                for ($i = 0; $i < 120; $i++) {
                    $desc = $desc . ($reviewParts[rand(0, count($reviewParts) - 1)]);
                }
                DB::table('reviews')->insert([
                    'profile_id' => mt_rand(1, 30),
                    'service_id' => $j,
                    'title' => substr($desc, 0, mt_rand(20,30)),
                    'rating' => mt_rand(0, 10),
                    'description' => $desc,
                ]);
            }
        }
    }


}
