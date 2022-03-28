<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Employees\iEmployeeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Emplyees\StoreEmployeeRequest;
use App\Http\Resources\Employees\EmployeeResource;
use App\Http\Resources\Employees\EmployeesCollection;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(
        private iEmployeeService $service
    )
    {
    }

    /**
     * @return EmployeesCollection
     */
    public function index(): EmployeesCollection
    {
        return new EmployeesCollection(
            $this->service->getList()->getItems()
        );
    }

    /**
     * @param StoreEmployeeRequest $request
     * @return EmployeeResource
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function store(StoreEmployeeRequest $request): EmployeeResource
    {
        return new EmployeeResource(
            $this->service->create($request->getFilterDTO())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
