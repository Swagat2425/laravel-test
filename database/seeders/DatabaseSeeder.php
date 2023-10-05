<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $now_date = date('Y-m-d H:i:s');

        $category1 = new Category();
        $category1->name = 'Personal';
        $category1->crt_by = 1;
        $category1->status = 1;
        $category1->crt_on = $now_date;
        $category1->save();

        $category1 = new Category();
        $category1->name = 'Food';
        $category1->crt_by = 1;
        $category1->status = 1;
        $category1->crt_on = $now_date;
        $category1->save();

        $category1 = new Category();
        $category1->name = 'Travel';
        $category1->crt_by = 1;
        $category1->status = 1;
        $category1->crt_on = $now_date;
        $category1->save();

        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);

    }
}
