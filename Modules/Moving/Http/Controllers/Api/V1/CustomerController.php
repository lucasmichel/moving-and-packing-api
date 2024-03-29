<?php

namespace Modules\Moving\Http\Controllers\Api\V1;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Moving\Http\Requests\Customer\CustomerRequest;
use Modules\Moving\Services\CustomerService;

/**
 * @group Customer
 * @authenticated
 *
 * APIs for managing Customers
 */
class CustomerController extends Controller
{
    use ApiResponser;

    private $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
        $this->middleware('can:customers');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->authorize('customers', 'index');
        $data = $this->service->index();
        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {
        $this->authorize('customers', 'store');
        $data = $this->service->store($request->all());
        return $this->successResponse($data, Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('customers', 'show');
        $data = $this->service->show($id);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $this->authorize('customers', 'update');
        $data = $this->service->update($request->all(), $id);
        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('customers', 'destroy');
        $data = $this->service->destroy($id);
        return $this->successResponse($data);
    }
}
