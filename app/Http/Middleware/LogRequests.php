<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log as LogModel;

class LogRequests
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
		$request->start = microtime(true);
		return $next($request);
	}

	/**
	 * Handle an outgoing response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse  $response
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function terminate(Request $request, $response)
	{
		$request->end = microtime(true);

		LogModel::create([
			'ip' => $request->ip(),
			'method' => $request->method(),
			'uri' => $request->path(),
			'user_agent' => $request->userAgent(),
			'duration' => $request->end - $request->start,
			'status_code' => $response->getStatusCode(),
		]);
	}
}
