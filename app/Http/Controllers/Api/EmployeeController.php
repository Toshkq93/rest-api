<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Employees\iEmployeeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Http\Requests\Emplyees\StoreEmployeeRequest;
use App\Http\Resources\Employees\EmployeeResource;
use App\Http\Resources\Employees\EmployeesCollection;
use App\Http\Resources\SuccessResource;

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
     * @param int $id
     * @return EmployeeResource
     */
    public function show(int $id): EmployeeResource
    {
        return new EmployeeResource(
            $this->service->show($id)
        );
    }

    /**
     * @param UpdateEmployeeRequest $request
     * @return SuccessResource
     */
    public function update(UpdateEmployeeRequest $request): SuccessResource
    {
        return new SuccessResource(
            $this->service->update($request->getFilterDTO())
        );
    }

    /**
     * @param int $id
     * @return SuccessResource
     */
    public function destroy(int $id): SuccessResource
    {
        return new SuccessResource(
            $this->service->delete($id)
        );
    }
}
