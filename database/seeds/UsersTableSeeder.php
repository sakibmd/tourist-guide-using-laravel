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
            'email' => 'superadmin@gmail.com',
            'contact' => '01670605075',
            'password' => bcrypt('rootadmin'),
            'created_at' => '2020-09-01 21:18:10.000000',
            'updated_at' => '2020-09-01 21:18:10.000000',
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Brain Stocks',
            'email' => 'user@gmail.com',
            'contact' => '01712121212',
            'password' => bcrypt('rootuser'),
            'created_at' => '2020-09-01 21:18:10.000000',
            'updated_at' => '2020-09-01 21:18:10.000000',
        ]);
    }
}
