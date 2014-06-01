<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'login' => 'Pierwszy',
                'email'    => 'pierwszy@wp.pl',
                'password' => Hash::make('pierwsze-hasełko')
            ],
            [
                'login' => 'Drugi',
                'email'    => 'drugi@o2.pl',
                'password' => Hash::make('drugie-hasełko')
            ],
            [
                'login' => 'Trzeci',
                'email'    => 'trzeci@interia.pl',
                'password' => Hash::make('trzecie-hasełko')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }

}
