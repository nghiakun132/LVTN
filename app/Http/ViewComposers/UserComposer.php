<?php

namespace App\Http\ViewComposers;

use App\Models\Cart;
use Illuminate\View\View;

class UserComposer
{
    public $cart;
    /**
     * Create a user composer.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (session('user')) {
            $cartItem = $this->cart->where('user_id', session('user')->id)->count();
            $view->with('cartItem', $cartItem);
        } else {
            $view->with('cartItem', 0);
        }
    }
}
