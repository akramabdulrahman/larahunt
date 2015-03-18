<?php

/*
 * This file is part of StyleCI.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Client ID
    |--------------------------------------------------------------------------
    |
    | This it your application client id.
    |
    */

    'id' => env('GITHUB_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | Client Secret
    |--------------------------------------------------------------------------
    |
    | This is your application client secret.
    |
    */

    'secret' => env('GITHUB_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Redirection URL
    |--------------------------------------------------------------------------
    |
    | This is where github sends people to after authenticating.
    |
    */

    'redirect' => env('APP_URL').'/auth/github-callback',

];
