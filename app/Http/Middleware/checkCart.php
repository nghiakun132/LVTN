<?php

namespace App\Http\Middleware;

use App\Http\ViewComposers\UserComposer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class checkCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userComposer = new UserComposer(app()->make('App\Models\Cart'));
        $userComposer->compose(View::make('layouts.client'));
        $count = $userComposer->cart->where('user_id', session('user')->id)->count();
        if ($count == 0) {
            return redirect()->route('client.cart');
        }
        return $next($request);
    }
}
