<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Services\Member\MemberService;
use Illuminate\Support\Facades\Response;

class MemberApiController extends Controller
{
	private $memberService;

	public function __construct(MemberService $memberService)
	{
		$this->memberService = $memberService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$members = $this->memberService->all();

		return Response::json([
			'message' => 'success',
			'data' => $members
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  MemberRequest  $memberRequest
	 * @return \Illuminate\Http\Response
	 */
	public function store(MemberRequest $memberRequest)
	{
		$member = $this->memberService->create($memberRequest);

		return Response::json([
			'message' => 'Member created successfully',
			'data' => $member
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Member $member
	 * @return \Illuminate\Http\Response
	 */
	public function show(Member $member)
	{
		$member = $this->memberService->findById($member->id);

		return Response::json([
			'message' => 'success',
			'data' => $member
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  MemberRequest  $request
	 * @param  Member $member
	 * @return \Illuminate\Http\Response
	 */
	public function update(MemberRequest $memberRequest, Member $member)
	{
		$member = $this->memberService->update($member->id, $memberRequest);

		return Response::json([
			'message' => 'Member updated successfully',
			'data' => $member
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Member $member
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Member $member)
	{
		$this->memberService->destroy($member->id);

		return Response::json([
			'message' => 'Member deleted successfully',
			'data' => null
		], 200);
	}
}
