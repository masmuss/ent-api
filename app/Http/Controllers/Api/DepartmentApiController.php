<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\Department\DepartmentService;
use Illuminate\Support\Facades\Response;

class DepartmentApiController extends Controller
{
	private $departmentServices;

	public function __construct(DepartmentService $departmentServices)
	{
		$this->departmentServices = $departmentServices;
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$departments = $this->departmentServices->all();

		return Response::json([
			'message' => 'success',
			'data' => $departments
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Request\DepartmentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(DepartmentRequest $departmentRequest)
	{
		$department = $this->departmentServices->create($departmentRequest);

		return Response::json([
			'message' => 'Department created successfully',
			'data' => $department
		], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Department  $department
	 * @return \Illuminate\Http\Response
	 */
	public function show(Department $department)
	{
		$department = $this->departmentServices->findById($department->id);

		return Response::json([
			'message' => 'Department retrieved successfully',
			'data' => $department
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\DepartmentRequest  $departmentRequest
	 * @param  Department  $department
	 * @return \Illuminate\Http\Response
	 */
	public function update(DepartmentRequest $departmentRequest, Department $department)
	{
		$department = $this->departmentServices->update($department->id, $departmentRequest);

		return Response::json([
			'message' => 'Department updated successfully',
			'data' => $department
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Department  $department
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Department $department)
	{
		$this->departmentServices->destroy($department->id);

		return Response::json([
			'message' => 'Department deleted successfully'
		], 200);
	}
}
