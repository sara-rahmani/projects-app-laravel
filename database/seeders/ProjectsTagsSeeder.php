<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Explicitly attach tags to projects
         $portfolioProject = Project::find(1);
         $portfolioProject->tags()->attach([1,2,3]);
    }
}
