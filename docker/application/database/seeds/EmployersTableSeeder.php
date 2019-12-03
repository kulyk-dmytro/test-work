<?php

use Illuminate\Database\Seeder;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Employer::class, 10)->create()->each(function ($employer) {
//            // Seed the relation with one company
////            $company = factory(App\Company::class)->make();
////            $employer->company()->save($company);
//        });

        factory(App\Employer::class, 10)->create()->each(function($employer) {
//            $employer->company()->save(factory(App\Company::class)->make());


            $company = factory(App\Company::class)->make();
            $employer->company()->associate($company->first()->id);
            $employer->save();
        });
    }
}
