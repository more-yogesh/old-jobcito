<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'email' => 'super@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => '2019-11-12 10:07:44'
        ]);
        $super->assignRole('super');

        $employee = User::create([
            'email' => 'employee@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => '2019-11-12 10:07:44'
        ]);

        $employee->assignRole('employee');
        $employer = User::create([
            'email' => 'employer@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => '2019-11-12 10:07:44'
        ]);
        $employer->assignRole('employer');
    }
}
