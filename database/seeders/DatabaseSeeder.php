<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TextWidget;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\Post::factory(50)->create();
/** @var User $adminUser */
        $adminUser = User::factory()->create([

            'email' => 'admin1@gmail.com' ,
            'name' => 'admin1' ,
            'password' => bcrypt('password')
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole2 = Role::create(['name' => 'manager']);
        $adminRole2 = Role::create(['name' => 'user']);

        $adminUser->assignRole($adminRole);

    $textwidget = TextWidget::factory()->create([
        'key' => 'header' ,
        'title' => 'Haghani Blog',
        'content' => 'Mohammad Amin Haghani'
    ]);
        $textwidget = TextWidget::factory()->create([
            'key' => 'footer' ,
            'title' => 'Haghani Blog',
            'content' => 'Mohammad Amin Haghani'
        ]);
        $textwidget = TextWidget::factory()->create([
            'key' => 'about-us' ,
            'title' => 'Haghani Blog',
            'content' => 'Mohammad Amin Haghani'
        ]);

    }
}
