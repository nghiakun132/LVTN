<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check cart for expired items';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $carts = Cart::all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        foreach ($carts as $cart) {
            if ((strtotime($now) - strtotime($cart->created_at))  > 14400) {
                Product::where('pro_id', $cart->product_id)->increment('pro_quantity', $cart->quantity);
                $cart->delete();
            }
        }


    }
}
