<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

//        factory(App\User::class, 10)->create()->each(function ($user) {
//            $user->posts()->save(factory(App\Post::class)->make());
//        });

//        factory(App\User::class, 10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        DB::table('courses')->truncate();
//        DB::table('course_registration')->truncate();
//        DB::table('course_trainer')->truncate();
//
//        App\Trainer::truncate();
//        App\Trainee::truncate();
//
//        App\Hall::truncate();
//        App\Speciality::truncate();
//        App\Affiliation::truncate();
//        App\ProfessionalData::truncate();
//        App\UniversityAffiliation::truncate();


        factory(App\Hall::class, 10)->create();

        factory(App\Speciality::class, 10)->create();
        factory(App\Affiliation::class, 10)->create();
        factory(App\ProfessionalData::class, 10)->create();
        factory(App\UniversityAffiliation::class, 10)->create();

        factory(App\Trainer::class, 10)->create();
        factory(App\Trainee::class, 10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
