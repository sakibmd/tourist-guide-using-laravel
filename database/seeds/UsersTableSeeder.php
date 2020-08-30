<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'contact' => '01670605075',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Brain Stocks',
            'email' => 'user@gmail.com',
            'contact' => '01712121212',
            'password' => bcrypt('rootuser'),
        ]);
    }
}
