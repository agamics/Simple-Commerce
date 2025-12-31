<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use App\Mail\SendLowStockDetails;
use Illuminate\Support\Facades\Mail;

class RunStockCkeck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-stock-ckeck';

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
        try {
            // Get all products
            $products = Product::all();
            $lowStock = [];

            foreach ($products as $product) {
                // Check if the product stock is less than or equal to 5
                if (($product->stock->quantity - $product->cart->sum('quantity')) <= 5) {
                    $lowStock[] = $product;
                }
            }

            // Send email notification
            Mail::to('admin@example.com')->send(new SendLowStockDetails($lowStock));
            echo 'Stock check processed successfully!';
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
