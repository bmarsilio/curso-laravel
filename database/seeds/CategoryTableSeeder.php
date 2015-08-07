<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 22/07/2015
 * Time: 22:39
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("TRUNCATE categories CASCADE;");
        DB::statement("ALTER SEQUENCE categories_id_seq RESTART 1;");
        factory('CodeCommerce\Category', 20)->create();
    }
}