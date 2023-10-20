<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        foreach(["Админ", "Преподователь", "Студент"] as $title){
            Role::factory(1)->create([
                'title' => $title,
            ]);
        }

        foreach(["ИСП", "РЭУ", "КСК"] as $title){
            Group::factory(1)->create([
                'title' => $title,
            ]);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
