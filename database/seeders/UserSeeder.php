<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'John Doe',
                'email' => 'john@email.com',
                'password' => 'password',
                'active' => 1
            ],
            [
                'role_id' => 2,
                'name' => 'Mike McMillan',
                'email' => 'mike@email.com',
                'password' => 'password',
                'active' => 0
            ],
        ];

        foreach ($users as $u) {
            $user = new User();
            $user->role_id = $u['role_id'];
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = Hash::make($u['password']);
            $user->active = $u['active'];
            $user->save();
        }
    }
}
