<?php

/*
 * This file is part of Larahunt.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Larahunt\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Util\StringUtils;

/**
 * This is the verify CSRF token middleware class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request|Request $request
     * @param \Closure $next
     *
     * @return mixed
     * @throws HttpException
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->isReading($request) || $this->tokensMatch($request)) {
            return $next($request);
        }

        throw new HttpException(403, 'The CSRF token could not be validated.');
    }

    /**
     * Determine if the http request uses a read verb.
     *
     * @param \Illuminate\Http\Request|Request $request
     *
     * @return bool
     */
    protected function isReading(Request $request)
    {
        return in_array($request->method(), ['HEAD', 'GET', 'OPTIONS'], true);
    }

    /**
     * Determine if the session and input csrf tokens match.
     *
     * @param \Illuminate\Http\Request|Request $request
     *
     * @return bool
     */
    protected function tokensMatch(Request $request)
    {
        $token = $request->session()->token();

        return StringUtils::equals($token, $request->input('_token')) || StringUtils::equals($token, $request->header('X-CSRF-TOKEN'));
    }
}
