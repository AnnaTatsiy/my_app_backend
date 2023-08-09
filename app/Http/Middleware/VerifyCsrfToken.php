<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $except = [
        '/unlimited-subscriptions/select-unlimited-subscriptions-by-customer',
        '/limited-subscriptions/select-limited-subscriptions-by-customer',
        '/customers/add',
        '/customers/edit',
        '/coaches/add',
        '/coaches/edit',
        '/customers/select-customers-by-passport',
        '/unlimited-subscriptions/add',
        '/limited-subscriptions/add',
        '/group-workouts/group-workout-edit'

    ];
}
