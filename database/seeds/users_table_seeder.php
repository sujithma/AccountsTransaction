<?php

use Illuminate\Database\Seeder;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
    	DB::table('users')->insert([
            'name' => 'sujith',
            'email'=>'sujith@gmail.com',
            'password'=>bcrypt('sujth'),
            'role_id'=>'1'
        ]);    
    }
}
