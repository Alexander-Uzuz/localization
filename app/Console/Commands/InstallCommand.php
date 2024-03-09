<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'install';

    protected $description = 'Command description';

    public function handle()
    {
        $this->call(InstallLanguagesCommand::class);

        $this->info('Установка завершена');
    }
}
