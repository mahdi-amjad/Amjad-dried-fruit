<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
 
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order)
    {
        // فقط کاربر صاحب سفارش اجازه دارد
        return $user->id === $order->user_id;
    }
    public function pay(User $user, Order $order)
    {
        // فقط صاحب سفارش اجازه پرداخت دارد
        return $user->id === $order->user_id;
    }

 
 

 
}
