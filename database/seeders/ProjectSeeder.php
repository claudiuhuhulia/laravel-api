<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {

        $technology_ids = Technology::pluck('id')->toArray();

        $type_ids = Type::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->type_id = Arr::random($type_ids);
            $project->name = $faker->text(20);
            $project->slug = Str::slug($project->name, '-');
            $project->content = $faker->paragraphs(15, true);
            $project->save();

            /* DOPO AVER SALVATO IL PROGETTO AGGIUNGO LA RELAZIONE N-N */

            $project_technologies = [];
            foreach ($technology_ids as $technology_id) {
                if ($faker->boolean()) $project_technologies[] = $technology_id;
            }

            $project->technologies()->attach($project_technologies);
        }
    }
}
