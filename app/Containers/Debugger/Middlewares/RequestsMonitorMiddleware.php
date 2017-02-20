<?php

namespace App\Containers\Debugger\Middlewares;

use App;
use App\Containers\Debugger\Traits\RequestsDebuggerTrait;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Config;
use Illuminate\Http\Request;
use Log;

/**
 * Class RequestsMonitorMiddleware
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class RequestsMonitorMiddleware extends Middleware
{
    use RequestsDebuggerTrait;

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return  mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $this->runRequestDebugger($request, $response);

        return $response;
    }
}
