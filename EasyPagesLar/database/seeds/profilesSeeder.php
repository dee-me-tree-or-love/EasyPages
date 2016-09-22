<?php

use Illuminate\Database\Seeder;

class profilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fnames = array("John","Karl","Alice","Ella","Peter","Franklin","Caroline");
        $lnames = array("McGreggor","Kavinsky","Peterson","Lucky","van Bergen","Torvalds","Smith");
        $sex = array("m","f");
// for every users atm
        for($j = 1; $j<54;$j++)
        {
            
            DB::table('profiles')->insert([
				'user_id' => $j,
				'fname' => $fnames[rand(0,count($fnames)-1)],
                                'lname' => $lnames[rand(0,count($lnames)-1)],
				'dob' => rand(1920,1999)."-0".rand(1,9)."-0".rand(1,9),
                                'address_id' => 0,
                                'sex' => $sex[rand(0,1)],
			]);
        }
    }
}
