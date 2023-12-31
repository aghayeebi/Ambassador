<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;


class UpdateRankings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rankings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $ambassadors = User::ambassadors()->get();

        $bar = $this->output->createProgressBar($ambassadors->count());
        $bar->start();
        $ambassadors->each(function(User $user) use ($bar) {
            Redis::zadd('rankings', (int)$user->revenue, $user->name);

            $bar->advance();
    });

        $bar->finish();

    }
}
