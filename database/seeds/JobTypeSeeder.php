<?php

use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JobType::create([
            'type' => 'Full Time',
        ]);
        \App\JobType::create([
            'type' => 'Freelance',
        ]);
        \App\JobType::create([
            'type' => 'Part Time',
        ]);
        \App\JobType::create([
            'type' => 'Internship',
        ]);
        \App\JobType::create([
            'type' => 'Temporary',
        ]);
    }
}
