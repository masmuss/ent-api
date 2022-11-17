<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailingRequest;
use App\Models\Mailing;
use App\Services\Mailing\MailingService;
use Illuminate\Support\Facades\Response;

class MailingApiController extends Controller
{
	private $mailingServices;

	public function __construct(MailingService $mailingServices)
	{
		$this->mailingServices = $mailingServices;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$mailings = $this->mailingServices->getAll();

		return Response::json([
			'message' => 'success',
			'data' => $mailings
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request\MailingRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(MailingRequest $request)
	{
		$mailing = $this->mailingServices->create($request);

		return Response::json([
			'message' => 'New mail created successfully',
			'data' => $mailing
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Mailing  $mailing
	 * @return \Illuminate\Http\Response
	 */
	public function show(Mailing $mailing)
	{
		return Response::json([
			'message' => 'success',
			'data' => $mailing
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Http\Requests\MailingRequest $request
	 * @param  Mailing  $mailing
	 * @return \Illuminate\Http\Response
	 */
	public function update(MailingRequest $request, Mailing $mailing)
	{
		$mailing = $this->mailingServices->update($mailing->id, $request);

		return Response::json([
			'message' => 'Record updated successfully',
			'data' => $mailing
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Mailing  $mailing
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Mailing $mailing)
	{
		$this->mailingServices->delete($mailing->id);

		return Response::json([
			'message' => 'Record deleted successfully',
			'data' => null
		], 200);
	}
}
