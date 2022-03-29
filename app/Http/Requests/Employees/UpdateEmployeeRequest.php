<?php

namespace App\Http\Requests\Employees;

use App\Filters\Employees\StoreEmployeeFilter;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required'
            ],
            'last_name' => [
                'string',
                'required'
            ],
            'patronymic' => [
                'string',
                'required'
            ],
            'salary' => [
                'integer',
                'required'
            ],
            'gender_id' => [
                'nullable',
                'integer',
                'exists:genders,id'
            ],
            'department_ids' => [
                'array',
                'required'
            ],
            'department_ids.*' => [
                'integer',
                'required',
                'exists:departments,id'
            ]
        ];
    }

    /**
     * @return StoreEmployeeFilter
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getFilterDTO(): StoreEmployeeFilter
    {
        $filter = new StoreEmployeeFilter(
            $this->validated()
        );
        $filter->setEmployeeId(request()->employee);

        return $filter;
    }
}
