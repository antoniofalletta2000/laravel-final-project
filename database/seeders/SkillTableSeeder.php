<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $skills = [
            'Diritto Amministrativo & Trasparenza PA',
            'Gestione Appalti Pubblici (Codice dei Contratti)',
            'Rendicontazione Fondi Europei (PO FESR / PNRR)',
            'Progettazione e Tutela dei Beni Culturali',
            'Gestione Emergenze & Protezione Civile',
            'Sistemi Informativi PA & Transizione Digitale',
            'Bilancio Pubblico e Contabilità Regionale',
            'Pianificazione e Programmazione Sanitaria',
            'Istruttoria di Pratiche Ambientali & VIA',
            'Gestione delle Risorse Umane nella PA'
        ];

        foreach($skills as $skill){
            $newSkill = new Skill();

            $newSkill->name = $skill;
            $newSkill->color = $faker->safeHexColor();

            $newSkill->save();
        }
    }
}
