<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

use App\Filters\AdminFilter;
use App\Filters\GuestFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'admin'         => AdminFilter::class,
        'guest'         => GuestFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'admin' => [
                'except' => [
                    '/', '/home',
                    'auth/*'
                ]
            ],
            'guest' => [
                'except' => [
                    '/', '/home',
                    'auth/*'
                ]
            ]
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'admin' => [
                'except' => [
                    '/', '/home',
                    'admin', 'admin/*',
                    'logout'
                ]
            ],
            'guest' => [
                'except' => [
                    '/', '/home',
                    'comic', 'comic/*',
                    'logout'
                ]
            ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}