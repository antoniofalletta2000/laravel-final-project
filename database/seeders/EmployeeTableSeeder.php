<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $departmentIds = Department::pluck('id')->toArray();
        $skillIds = Skill::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            $newEmployee = new Employee();

            $newEmployee->name = $faker->firstName();
            $newEmployee->last_name = $faker->lastName();
            $newEmployee->phone_number = "+39 3" . $faker->unique()->numerify("#########");
            $newEmployee->email = $faker->unique()->email();
            $newEmployee->department_id = $faker->randomElement($departmentIds);

            $newEmployee->save();

            if (!empty($skillIds)) {
                $numberOfSkills = rand(1, 4);

                $randomSkillIds = collect($skillIds)->shuffle()->take($numberOfSkills)->all();

                $newEmployee->skills()->attach($randomSkillIds);
            }
        }
    }
}
