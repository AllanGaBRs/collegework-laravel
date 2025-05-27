<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Cria o banco de dados, se ainda não existir.';

    public function handle()
    {
        $database = Config::get('database.connections.mysql.database');
        Config::set('database.connections.mysql.database', null);
        DB::statement("CREATE DATABASE IF NOT EXISTS `$database`");
        Config::set('database.connections.mysql.database', $database);

        $this->info("Banco de dados '$database' criado ou já existia.");
    }
}
