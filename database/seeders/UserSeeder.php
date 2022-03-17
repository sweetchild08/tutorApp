<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profiles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User([
            'username'=>'admin',
            'password' => Hash::make('admin'),
            'usertype'=>'admin',
            'email'=>'admin@example.com',
        ]);
        if($user->save()){
            Profiles::create([
                'user_id' => $user->id,
                'first_name'=>'Administrator',
                'last_name'=>'',
            ]);
        }

    }
}
