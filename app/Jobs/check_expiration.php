<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Models\ProductStore;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class check_expiration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $product_stores = ProductStore::all();
        Log::info("working"); 
        foreach($product_stores as $product_store){
            // Log::info($product_store); 
            $product_store->flag +=1;
            $product_store->save();
            // $product_store::update(
            //     [
            //          'flag' => $product_store->flag + 1
            //     ]
            //     );
        }

    }
}
