<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = array([
                'name' => 'JavaScript',
                'description' => 'Langage de script JavaScript',
                'logo' => 'js.png',
            ], 
            [
                'name' => 'HTML5 - CSS3',
                'description' => 'Langage HTML5 et CSS3 pour le developpement Web',
                'logo' => 'html-css.png',
            ],
            [
                'name' => 'PHP',
                'description' => 'Langage de script PHP, utilise cote serveur pour les application Web',
                'logo' => 'php.png',
            ],
            [
                'name' => 'Python',
                'description' => 'Langage de script Python',
                'logo' => 'python.png',
            ]);
        App\Skill::insert($data);
    }
}
