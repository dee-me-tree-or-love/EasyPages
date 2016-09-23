<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	$usernameparts = array("XXX","kekek","lover","1993","holly","oldandhot","1940","XoXo","lovely");
	$passwords = array("se","zxc","asd","123v"); $emails = array("mail.ru","yahoo.com","gmail.com","hotmail.com");
        for($j=1; $j<70; $j++)
		{
			$uname = "";
			for($i=0; $i<3; $i++)
			{
				$uname = $uname.($usernameparts[rand(0,count($usernameparts)-1)]);
			}
                        $password = "";
                        for($i; $i<5; $i++)
                        {
                            $password = $password.($passwords[rand(0,count($passwords)-1)]);
                        }
			DB::table('users')->insert([
				'username' => $uname,
				'email' => $uname."@".$emails[rand(0,count($emails)-1)],
				'password' => $password,
			]);
		}
  
    }
}
