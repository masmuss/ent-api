<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

		$this->log($request, $response);
	}

	/**
	 * Log the request and response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse  $response
	 * @return void
	 */
	protected function log(Request $request, $response)
	{
		$method = $request->getMethod();
		$uri = $request->fullUrl();
		$ip = $request->getClientIp();
		$agent = $request->userAgent();
		$duration = $request->end - $request->start;
		$statusCode = $response->getStatusCode();

		Log::info(
			"{$ip} : {$method} @{$uri} {$agent} {$duration}\n" .
				"{$statusCode}\n" .
				"Request : {[$request->all()]}\n" .
				"Response : {$response->getContent()}"
		);
	}
}
