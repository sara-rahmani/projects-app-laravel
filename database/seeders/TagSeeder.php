<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);
        Tag::create([
            'name' => 'HTML',
            'slug' => 'html',
        ]);
        Tag::create([
            'name' => 'Javascript',
            'slug' => 'js',
        ]);
        Tag::create([
            'name' => 'Docker',
            'slug' => 'docker',
        ]);
    
}
}