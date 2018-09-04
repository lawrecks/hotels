<?php

use App\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->delete();
        Hotel::create(array(
            'username' => 'lawrecks',
            'phone_no' => '08168441395',
            'email'    => 'ugobugo@gmail.com',
            'password' => Hash::make('awesome'),
            'city'    => 'Lagos',
            'bank_name'    => 'first_bank',
            'account_no'    => '30876758474',
            'account_name'    => 'Ejiogu Ugochukwu Lawrence',
        ));
    }
}
