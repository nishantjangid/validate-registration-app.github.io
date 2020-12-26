<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            'name'=>'Nishant Jangid',
            'email'=>'nish@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'7690846594'
        ]);        

    }
}
