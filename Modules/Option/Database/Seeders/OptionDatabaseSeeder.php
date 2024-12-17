<?php

namespace Modules\Option\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class OptionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
