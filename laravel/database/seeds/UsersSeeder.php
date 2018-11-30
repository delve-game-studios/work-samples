<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'active' => true,
            'name' => 'Ivan Dokov',
            'email' => 'ivan@jetspark.io',
            'password' => bcrypt(1),
        ]);

        factory(\App\Models\User::class)->create([
            'active' => true,
            'name' => 'Todor Voynski',
            'email' => 'voynski@jetspark.io',
            'password' => bcrypt(1),
        ]);
    }
}
