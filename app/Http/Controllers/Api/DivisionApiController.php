<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionRequest;
use App\Models\Division;
use App\Services\Division\DivisionService;
use Illuminate\Support\Facades\Response;

class DivisionApiController extends Controller
{
	private $divisionServices;

	public function __construct(DivisionService $divisionServices)
	{
		$this->divisionServices = $divisionServices;
	}

	/**
	 * Display a listing of the resource.
	 * @param \App\Services\Api\DivisionApiServices  $divisionApiServices
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$divisions = $this->divisionServices->all();

		return Response::json([
			'message' => 'success',
			'data' => $divisions
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request\DivisionRequest  $divisionRequest
	 * @return \Illuminate\Http\Response
	 */
	public function store(DivisionRequest $divisionRequest)
	{
		$division = $this->divisionServices->create($divisionRequest);

		return Response::json([
			'message' => 'Division created successfully',
			'data' => $division
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Division  $division
	 * @return \Illuminate\Http\Response
	 */
	public function show(Division $division)
	{
		$division = $this->divisionServices->findById($division->id);
		return Response::json([
			'message' => 'Division retrieved successfully',
			'data' => $division
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request\DivisionRequest  $divisionRequest
	 * @param  Division  $division
	 * @return \Illuminate\Http\Response
	 */
	public function update(DivisionRequest $divisionRequest, Division $division)
	{
		$division = $this->divisionServices->update($division->id, $divisionRequest);

		return Response::json([
			'message' => 'Division updated successfully',
			'data' => $division
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Division  $division
	 * @param \App\Services\Api\DivisionApiServices  $divisionApiServices
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Division $division)
	{
		$division = $this->divisionServices->destroy($division->id);

		return Response::json([
			'message' => 'Division deleted successfully',
			'data' => $division
		], 200);
	}
}
