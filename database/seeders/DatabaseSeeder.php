<?php

namespace Database\Seeders;

use App\Models\NodoModel;
use App\Models\TipoDocumentoModel;
use App\Models\TipoFormatoModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        //TipoDocumentoModel::factory(50)->create();
        //TipoFormatoModel::factory(50)->create();
        NodoModel::factory(50)->create();
    }
}
