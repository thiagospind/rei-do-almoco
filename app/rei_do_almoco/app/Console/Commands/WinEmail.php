<?php

namespace App\Console\Commands;

use App\Http\Controllers\VoteController;
use Illuminate\Console\Command;

class WinEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'winemail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de email para o rei do almoço.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $winemail = new VoteController();
        $winemail->closeVotation();
        $this->info('Email do vencedor enviado!');
    }
}
