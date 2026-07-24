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
        $job_titles = [
            "Dirigente di Servizio",
            "Funzionario Amministrativo",
            "Funzionario Contabile",
            "Funzionario Tecnico",
            "Funzionario Legale",
            "Funzionario Informatico",
            "Specialista Fondi Europei",
            "Istruttore Amministrativo",
            "Istruttore Contabile",
            "Istruttore Tecnico",
            "Istruttore Informatico",
            "Collaboratore Amministrativo",
            "Addetto al Protocollo",
            "Responsabile Unico del Procedimento (RUP)"
        ];
        $departmentIds = Department::pluck('id')->toArray();
        $skillIds = Skill::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            $newEmployee = new Employee();

            $newEmployee->name = $faker->firstName();
            $newEmployee->last_name = $faker->lastName();
            $newEmployee->phone_number = "+39 3" . $faker->unique()->numerify("#########");
            $newEmployee->email = $faker->unique()->email();
            $newEmployee -> job_title = $faker->randomElement($job_titles);
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
