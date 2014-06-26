<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $userDataSet = [
            [
                'username' => 'Admin',
                'email'    => 'admin@demo.com',
                'password' => Hash::make('admin')
            ],
            [
                'username' => 'Demo',
                'email'    => 'demo@demo.com',
                'password' => Hash::make('demo')
            ],
        ];

        foreach ($userDataSet as $userData) {
            $user = new User;
            $user->fill($userData);
            $user->save();
        }
    }
}