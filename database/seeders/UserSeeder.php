<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $now_date = date('Y-m-d H:i:s');

        $user = new User();
        $user->name = 'Swagat Patil';
        $user->email = 'swagat@gmail.com';
        $user->password = Hash::make('12345678');
        $user->status = 1;
        $user->crt_on = $now_date;
        $user->updt_on = $now_date;
        $user->save();
      
    }
}
