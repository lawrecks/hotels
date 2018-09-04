<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'lawrecks',
            'phone_no' => '08168441395',
            'email'    => 'ugobugo@gmail.com',
            'password' => bcrypt('lawrence'),
            'confirm_password' => bcrypt('lawrence'),
            'city'    => 'Lagos',
            'bank_name' => 'First Bank',
            'account_no' => '30876758474',
            'account_name' => 'Ejiogu Ugochukwu Lawrence',
            'role_id' => Role::$SA
        ));
    }
}
