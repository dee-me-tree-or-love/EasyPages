<?php

use Illuminate\Database\Seeder;

class servicesTableSeeder extends Seeder
{
    public function run()
    {
		$titles = array("Creative","Babysitting","Hair","Tailor","Repair","Cutter","Faboulous","Styling and Fashion","Incorporated");
		$descriptions = array("We ","love ","doing ","our job ",".","creativity ",".",",","fashion ", "and ","our clients ");
		for($j=0; $j<10; $j++)
		{
			$desc = "";
			for($i=0; $i<120; $i++)
			{
				$desc = $desc.($descriptions[rand(0,count($descriptions)-1)]);
			}
			DB::table('services')->insert([
				'title' => $titles[rand(0,count($titles)-1)]." ".$titles[rand(0,count($titles)-1)]." ".$titles[rand(0,count($titles)-1)],
				'price' => mt_rand (1*10, 1000*10) / 10,
				'description' => $desc,
			]);
		}
    }    
}
/*
public function run()
    {
		
        DB::table('services')->insert([
			'title' => "SuperBarbers",
			'price' => 100,
			'description' => "We are the supeeeeeer barbers!",
		]);
    }


private $titles = array("Creative","Babysitting","Hair","Tailor","Repair","Cutter","Faboulous","Styling and Fashion","Incorporated");
	private $descriptions = array("We ","love ","doing ","our job ","creativity ","fashion ", "and ","our clients");
public function run()
    {
		$desc = "";
		for($i=0; i<120; i++)
		{
			$desc = $desc.($this->$descriptions[rand(0,count($this->$descriptions)));
		}
        DB::table('services')->insert([
			'title' => $this->$titles[rand(0,8)]." ".$this->$titles[rand(0,count($this->$titles))],
			'price' => mt_rand ($min*10, $max*10) / 10,
			'description' => $desc,
		]);
    }
	*/