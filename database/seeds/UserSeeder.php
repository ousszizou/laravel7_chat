<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        User::firstOrcreate([
            "name" => config("project.seed.test_name"),
            "email" => config("project.seed.test_email"),
            "password" => bcrypt(config("project.seed.test_password")),
        ]);
    }
}
