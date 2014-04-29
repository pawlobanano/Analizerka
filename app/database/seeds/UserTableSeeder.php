<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'username' => 'Pierwszy',
                'email'    => 'pierwszy@wp.pl',
                'password' => Hash::make('pierwsze-hasełko')
            ],
            [
                'username' => 'Drugi',
                'email'    => 'drugi@o2.pl',
                'password' => Hash::make('drugie-hasełko')
            ],
            [
                'username' => 'Trzeci',
                'email'    => 'trzeci@interia.pl',
                'password' => Hash::make('trzecie-hasełko')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }

}
