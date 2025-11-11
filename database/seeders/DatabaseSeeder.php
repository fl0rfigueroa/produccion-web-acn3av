<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        /*
        $this->call([
            CourseSeeder::class
        ]);*/

        User::factory()->create([
            'name' => 'Usuario Demo',
            'email' => 'lolo.alex@example.com',
            'password' => Hash::make('123'),
        ]);

        Course::factory(22)->create();
        }
}
