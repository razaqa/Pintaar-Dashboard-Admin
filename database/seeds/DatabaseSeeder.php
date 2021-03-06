<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CartTableSeeder::class);
        $this->call(PembelianCourseTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CartCourseTableSeeder::class);
    }
}
