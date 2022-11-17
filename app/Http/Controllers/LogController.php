<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LogController extends Controller
{
	public function index()
	{
		$logs = Log::latest()->get();
		return Response::json([
			'status' => 'success',
			'data' => $logs,
		]);
	}
}
