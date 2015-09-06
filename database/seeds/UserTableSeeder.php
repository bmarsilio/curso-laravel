<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 22/07/2015
 * Time: 22:39
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("TRUNCATE users CASCADE;");

        factory('CodeCommerce\User', 10)->create();
    }
}