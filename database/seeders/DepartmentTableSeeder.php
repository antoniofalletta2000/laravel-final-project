<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $departments = [
            [
                'name' => 'Dipartimento Presidenza',
                'description' => 'Coordina le attività istituzionali della Presidenza, la protezione civile, la programmazione dei fondi europei e le relazioni extraregionali.'
            ],
            [
                'name' => 'Dipartimento Agricoltura',
                'description' => 'Promuove le produzioni agroalimentari locali, gestisce i contributi europei del PSR, la certificazione di qualità e lo sviluppo rurale.'
            ],
            [
                'name' => 'Dipartimento Funzione Pubblica',
                'description' => 'Supervisiona le autonomie locali, gestisce le risorse umane dell\'amministrazione regionale, i concorsi pubblici e la transizione digitale.'
            ],
            [
                'name' => 'Dipartimento Beni Culturali',
                'description' => 'Tutela, conserva e valorizza l\'immenso patrimonio archeologico, storico, artistico e museale della Regione attraverso Soprintendenze e Parchi.'
            ],
            [
                'name' => 'Dipartimento Economia',
                'description' => 'Cura la stesura del bilancio regionale, monitora la spesa pubblica, gestisce le entrate fiscali e il patrimonio immobiliare dell\'Ente.'
            ],
            [
                'name' => 'Dipartimento Energia',
                'description' => 'Pianifica le politiche energetiche, incentiva la transizione verso le fonti rinnovabili e gestisce i servizi di pubblica utilità come acqua e rifiuti.'
            ],
            [
                'name' => 'Dipartimento Politiche Sociali',
                'description' => 'Coordina gli interventi di contrasto alla povertà, i servizi socio-assistenziali per disabili e famiglie, oltre alla gestione del mercato del lavoro.'
            ],
            [
                'name' => 'Dipartimento Infrastrutture e Mobilità',
                'description' => 'Programma e realizza le opere pubbliche regionali (strade, porti, ferrovie) e gestisce il trasporto pubblico locale sia urbano che extraurbano.'
            ],
            [
                'name' => 'Dipartimento Istruzione',
                'description' => 'Gestisce il diritto allo studio scolastico e universitario, l\'edilizia scolastica, l\'offerta formativa accreditata e la formazione professionale.'
            ],
            [
                'name' => 'Dipartimento Salute',
                'description' => 'Pianifica la rete ospedaliera e sanitaria regionale, ripartisce il fondo sanitario, gestisce la prevenzione e l\'osservatorio epidemiologico.'
            ],
            [
                'name' => 'Dipartimento Territorio e Ambiente',
                'description' => 'Gestisce le valutazioni ambientali (VIA/VAS), la tutela di parchi e riserve, la pianificazione urbanistica e il contrasto all\'abusivismo.'
            ],
            [
                'name' => 'Dipartimento Turismo e Sport',
                'description' => 'Promuove il brand regionale nel mondo, sostiene gli eventi culturali, lo spettacolo, le produzioni cinematografiche e l\'impiantistica sportiva.'
            ],
        ];

        foreach ($departments as $department) {
            $newDepartment = new Department();

            $newDepartment->name = $department["name"];
            $newDepartment->address = $faker->streetAddress();
            $newDepartment->phone_number =  $faker->unique()->numerify("091#######");
            $newDepartment->email = "dipartimento" . $faker->unique()->numerify("###") . "@faker.it";
            $newDepartment->description = $department["description"];

            $newDepartment->save();
        }
    }
}
