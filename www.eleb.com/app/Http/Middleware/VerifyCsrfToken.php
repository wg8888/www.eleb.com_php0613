<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //排除不需要csrf_token验证的路由
        'member/Begister',
        'member/Sms',
        'member/Login',
        'addresse/Add'
    ];
}
