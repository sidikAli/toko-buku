<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'name'		=> 'admin',
    		'email' 	=> 'admin@bacalah.com',
    		'password'	=> bcrypt('rahasia'),
    		'role'		=> 'admin',
    	]);
    }
}
