<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'IT and Computers'],
                'slug' => 'it-and-software',
                'description' => 'Software Engineers, Frontend Developers, Graphic Designers, Digital Marketing Anything title regarding software industry'
            ]);
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'Accounting and Finance'],
                'slug' => 'accounting-and-finance',
                'description' => 'A financial accountant who is part of the accounting department at an organization often keeps records of financial statements, supervises tax payments and maintains accounts. Financial accountants may work extensively with technology to compute, maintain and classify financial records.'
            ]);
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'Human Resources'],
                'slug' => 'human-resources',
                'description' => 'Human resources specialists are responsible for recruiting, screening, interviewing and placing workers. They may also handle employee relations, payroll, benefits, and training. Human resources managers plan, direct and coordinate the administrative functions of an organization.'
            ]);
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'Clerical & Data Entry'],
                'slug' => 'clerical-and-data-entry',
                'description' => 'Data entry operator responsibilities include collecting and entering data in databases and maintaining accurate records of valuable company information.'
            ]);
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'Management Jobs'],
                'slug' => 'management-jobs',
                'description' => 'The manager is an employee who is responsible for planning, directing and overseeing the operations and fiscal health of a business unit, division, department, or an operating unit within an organization. The manager is responsible for overseeing and leading the work of a group of people in many instances.'
            ]);
        app('rinvex.categories.category')->create(
            [
                'name' => ['en' => 'Public Relations'],
                'slug' => 'public-relations-jobs',
                'description' => 'Public relations specialists build and maintain a positive public image for a company or organization. They create media, from press releases to social media messages, that shape public opinion of the company or organization and increase awareness of its brand'
            ]);

    }
}
