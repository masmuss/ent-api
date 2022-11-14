<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinanceRequest;
use App\Models\Finance;
use App\Services\Finance\FinanceService;
use Illuminate\Support\Facades\Response;

class FinanceApiController extends Controller
{
	private $financeServices;

	public function __construct(FinanceService $financeServices)
	{
		$this->financeServices = $financeServices;
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$finances = $this->financeServices->getAll();

		return Response::json([
			'message' => 'success',
			'data' => $finances
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request\FinanceRequest  $financeRequest
	 * @return \Illuminate\Http\Response
	 */
	public function store(FinanceRequest $financeRequest)
	{
		$finance = $this->financeServices->create($financeRequest);

		return Response::json([
			'message' => 'New record created successfully',
			'data' => $finance
		], 201);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request\FinanceRequest  $financeRequest
	 * @param  Finance  $finance
	 * @return \Illuminate\Http\Response
	 */
	public function update(FinanceRequest $financeRequest, Finance $finance)
	{
		$finance = $this->financeServices->update($finance->id, $financeRequest);

		return Response::json([
			'message' => 'Record updated successfully',
			'data' => $finance
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Finance  $finance
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Finance $finance)
	{
		$this->financeServices->delete($finance->id);

		return Response::json([
			'message' => 'Record deleted successfully',
		], 200);
	}
}
