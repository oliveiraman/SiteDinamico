<?php

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
         $this->call(UsuariosSedds::class);
         $this->call(PaginasSeeds::class);
         $this->call(PapelSeeds::class);
         $this->call(PermissaoSeeds::class);
    }
}
