<?php

namespace App\Console\Commands;

use App\Services\Sync\SyncProductDataFromApiService;
use Illuminate\Console\Command;

class CommandSyncProductsFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'psw-sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var \App\Services\Sync\SyncProductDataFromApiService
     */
    protected $syncProductDataFromApiService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SyncProductDataFromApiService $syncProductDataFromApiService)
    {
        parent::__construct();
        $this->syncProductDataFromApiService = $syncProductDataFromApiService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = $this->syncProductDataFromApiService->sync();

        if($result) {
            $this->call('scout:import "App\Models\ProductMaster"');
        }

    }
}
