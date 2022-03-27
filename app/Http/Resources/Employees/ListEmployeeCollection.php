<?php

namespace App\Http\Resources\Employees;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ListEmployeeCollection extends ResourceCollection
{
    public $collects = ListEmployeeResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
