<?php

namespace App\Traits;

trait RegisterUser
{
    public function registerUser($fields)
    {   

        $user = \App\Models\User::create([
            'name'      => $fields->name,
            'username'  => $fields->username,
            'email'     => $fields->email,
            'role'      => $fields->role,
            'password'  => $fields->password
        ]);

        return $user;
    }
}
