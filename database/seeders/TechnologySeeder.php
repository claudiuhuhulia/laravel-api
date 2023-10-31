<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['label' => 'HTML', 'color' => 'danger', 'icon' => 'fa-brands fa-html5'],
            ['label' => 'CSS', 'color' => 'info', 'icon' => 'fa-brands fa-css3-alt'],
            ['label' => 'ES6', 'color' => 'warning', 'icon' => 'fa-brands fa-js'],
            ['label' => 'Bootstrap', 'color' => 'dark', 'icon' => 'fa-brands fa-bootstrap'],
            ['label' => 'PHP', 'color' => 'primary', 'icon' => 'fa-brands fa-php'],
            ['label' => 'SQL', 'color' => 'secondary', 'icon' => 'fa-solid fa-database'],
            ['label' => 'Laravel', 'color' => 'danger', 'icon' => 'fa-brands fa-laravel'],
            ['label' => 'VueJS', 'color' => 'success', 'icon' => 'fa-brands fa-vuejs'],
        ];

        foreach ($technologies as $technology) {
            $new_technology = new  Technology();
            $new_technology->label = $technology['label'];
            $new_technology->color = $technology['color'];
            $new_technology->icon = $technology['icon'];
            $new_technology->save();
        };
    }
}