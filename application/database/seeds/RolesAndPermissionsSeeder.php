<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=>'calender show']);

        Permission::create(['name' => 'course add']);
        Permission::create(['name' => 'course list']);
        Permission::create(['name' => 'course show']);
        Permission::create(['name' => 'course edit']);
        Permission::create(['name' => 'course remove']);

        Permission::create(['name' => 'trainer add']);
        Permission::create(['name' => 'trainer list']);
        Permission::create(['name' => 'trainer show']);
        Permission::create(['name' => 'trainer edit']);
        Permission::create(['name' => 'trainer remove']);

        Permission::create(['name' => 'trainee add']);
        Permission::create(['name' => 'trainee list']);
        Permission::create(['name' => 'trainee show']);
        Permission::create(['name' => 'trainee edit']);
        Permission::create(['name' => 'trainee remove']);

        Permission::create(['name' => 'traineeAttendance add']);
        Permission::create(['name' => 'traineeAttendance list']);
        Permission::create(['name' => 'traineeAttendance show']);
        Permission::create(['name' => 'traineeAttendance edit']);
        Permission::create(['name' => 'traineeAttendance remove']);

        Permission::create(['name' => 'trainerAttendance add']);
        Permission::create(['name' => 'trainerAttendance list']);
        Permission::create(['name' => 'trainerAttendance show']);
        Permission::create(['name' => 'trainerAttendance edit']);
        Permission::create(['name' => 'trainerAttendance remove']);


        Permission::create(['name' => 'affiliation add']);
        Permission::create(['name' => 'affiliation list']);
        Permission::create(['name' => 'affiliation show']);
        Permission::create(['name' => 'affiliation edit']);
        Permission::create(['name' => 'affiliation remove']);

        Permission::create(['name' => 'courseEvaluation add']);
        Permission::create(['name' => 'courseEvaluation list']);
        //Permission::create(['name' => 'courseEvaluation show']);
        //Permission::create(['name' => 'courseEvaluation edit']);
        Permission::create(['name' => 'courseEvaluation remove']);

        Permission::create(['name' => 'courseRegistration add']);
        Permission::create(['name' => 'courseRegistration list']);
        //Permission::create(['name' => 'courseRegistration show']);
        //Permission::create(['name' => 'courseRegistration edit']);
        Permission::create(['name' => 'courseRegistration remove']);

        Permission::create(['name' => 'hall add']);
        Permission::create(['name' => 'hall list']);
        Permission::create(['name' => 'hall show']);
        Permission::create(['name' => 'hall edit']);
        Permission::create(['name' => 'hall remove']);

        Permission::create(['name' => 'lecture add']);
        Permission::create(['name' => 'lecture list']);
        Permission::create(['name' => 'lecture show']);
        Permission::create(['name' => 'lecture edit']);
        Permission::create(['name' => 'lecture remove']);

        Permission::create(['name' => 'permission add']);
        Permission::create(['name' => 'permission list']);
        Permission::create(['name' => 'permission show']);
        Permission::create(['name' => 'permission edit']);
        Permission::create(['name' => 'permission remove']);

        Permission::create(['name' => 'professionalData add']);
        Permission::create(['name' => 'professionalData list']);
        Permission::create(['name' => 'professionalData show']);
        Permission::create(['name' => 'professionalData edit']);
        Permission::create(['name' => 'professionalData remove']);

        Permission::create(['name' => 'role add']);
        Permission::create(['name' => 'role list']);
        Permission::create(['name' => 'role show']);
        Permission::create(['name' => 'role edit']);
        Permission::create(['name' => 'role remove']);

        Permission::create(['name' => 'speciality add']);
        Permission::create(['name' => 'speciality list']);
        Permission::create(['name' => 'speciality show']);
        Permission::create(['name' => 'speciality edit']);
        Permission::create(['name' => 'speciality remove']);

        Permission::create(['name' => 'traineeAssessment add']);
        Permission::create(['name' => 'traineeAssessment list']);
        //Permission::create(['name' => 'traineeAssessment show']);
        //Permission::create(['name' => 'traineeAssessment edit']);
        Permission::create(['name' => 'traineeAssessment remove']);

        Permission::create(['name' => 'trainerEvaluation add']);
        Permission::create(['name' => 'trainerEvaluation list']);
        Permission::create(['name' => 'trainerEvaluation show']);
        Permission::create(['name' => 'trainerEvaluation edit']);
        Permission::create(['name' => 'trainerEvaluation remove']);

        Permission::create(['name' => 'universityAffiliation add']);
        Permission::create(['name' => 'universityAffiliation list']);
        Permission::create(['name' => 'universityAffiliation show']);
        Permission::create(['name' => 'universityAffiliation edit']);
        Permission::create(['name' => 'universityAffiliation remove']);

        Permission::create(['name' => 'user add']);
        Permission::create(['name' => 'user list']);
        Permission::create(['name' => 'user show']);
        Permission::create(['name' => 'user edit']);
        Permission::create(['name' => 'user remove']);

        Permission::create(['name' => 'courseTrainer add']);
        Permission::create(['name' => 'courseTrainer list']);
        Permission::create(['name' => 'courseTrainer show']);
        Permission::create(['name' => 'courseTrainer edit']);
        Permission::create(['name' => 'courseTrainer remove']);
    }
}
