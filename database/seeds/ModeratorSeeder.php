<?php

use Illuminate\Database\Seeder;
use App\User;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 4)->create([
            'role' => 2,
        ]);
    }
}
