<?php
namespace App\Service;

use DB;

/**
 * Created by PhpStorm.
 * User: satake
 * Date: 2015/10/22
 * Time: 14:28
 */


class UserService{

    public function createUser($google_info){

            DB::table('users')->insert([
                'google_id' => $google_info->getId(),
                'name' => $google_info->getName(),
                'email' => $google_info->getEmail(),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

            $user = DB::table('users')->where('google_id',$google_id)->first();

        return $user;

    }

    public function getUser($google_id)
    {

        $user = DB::table('users')
            ->where('google_id', $google_id)
            ->select('id', 'name', 'email')
            ->first();

        return $user;
    }

}

