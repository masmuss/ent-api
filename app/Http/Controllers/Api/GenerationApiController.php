<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerationRequest;
use App\Models\Generation;
use App\Services\Generation\GenerationService;
use Illuminate\Support\Facades\Response;

class GenerationApiController extends Controller
{
	private $generationService;

	public function __construct(GenerationService $generationService)
	{
		$this->generationService = $generationService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$generations = $this->generationService->all();

		return Response::json([
			'message' => 'success',
			'data' => $generations
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\GenerationRequest  $generationRequest
	 * @return \Illuminate\Http\Response
	 */
	public function store(GenerationRequest $generationRequest)
	{
		$generation = $this->generationService->create($generationRequest);

		return Response::json([
			'message' => 'Generation created successfully',
			'data' => $generation
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Generation $generation
	 * @return \Illuminate\Http\Response
	 */
	public function show(Generation $generation)
	{
		$generation = $this->generationService->findById($generation->id);

		return Response::json([
			'message' => 'Generation retrieved successfully',
			'data' => $generation
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  GenerationRequest  $generationRequest
	 * @param  Generation $generation
	 * @return \Illuminate\Http\Response
	 */
	public function update(GenerationRequest $generationRequest, Generation $generation)
	{
		$generation = $this->generationService->update($generation->id, $generationRequest);

		return Response::json([
			'message' => 'Generation updated successfully',
			'data' => $generation
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Generation $generation
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Generation $generation)
	{
		$this->generationService->destroy($generation->id);

		return Response::json([
			'message' => 'Generation deleted successfully',
		], 200);
	}
}
