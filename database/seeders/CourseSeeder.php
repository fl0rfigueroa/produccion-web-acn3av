<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'Curso de Laravel',
            'description' => 'Aprende Laravel desde cero',
            'price' => 49.99,
            'is_visible' => true
        ]);

        Course::create([
            'title' => 'JavaScript Avanzado',
            'description' => 'Domina JavaScript y sus frameworks modernos',
            'price' => 59.99,
            'is_visible' => true
        ]);

        Course::create([
            'title' => 'Python para Principiantes',
            'description' => 'Introducción a la programación con Python',
            'price' => 39.99,
            'is_visible' => true
        ]);
    }
}