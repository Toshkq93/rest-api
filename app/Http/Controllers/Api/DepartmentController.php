<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Departments\iDepartmentsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Departments\StoreDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;
use App\Http\Resources\Departments\DepartmentsCollection;
use App\Http\Resources\Departments\DepartmentsResource;
use App\Http\Resources\SuccessResource;

class DepartmentController extends Controller
{
    public function __construct(
        private iDepartmentsService $service
    )
    {
    }

    /**
     * @return DepartmentsCollection
     */
    public function index(): DepartmentsCollection
    {
        return new DepartmentsCollection(
            $this->service->getList()->getItems()
        );
    }

    /**
     * @param StoreDepartmentRequest $request
     * @return DepartmentsResource
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function store(StoreDepartmentRequest $request): DepartmentsResource
    {
        return new DepartmentsResource(
            $this->service->create($request->getFilterDTO())
        );
    }

    /**
     * @param int $id
     * @return DepartmentsResource
     */
    public function show(int $id): DepartmentsResource
    {
        return new DepartmentsResource(
            $this->service->show($id)
        );
    }

    /**
     * @param UpdateDepartmentRequest $request
     * @return SuccessResource
     */
    public function update(UpdateDepartmentRequest $request): SuccessResource
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
