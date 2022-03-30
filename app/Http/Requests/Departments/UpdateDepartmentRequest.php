<?php

namespace App\Http\Requests\Departments;

use App\Filters\Departments\StoreDepartmentFilter;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ]
        ];
    }

    /**
     * @return StoreDepartmentFilter
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getFilterDTO(): StoreDepartmentFilter
    {
        $filter = new StoreDepartmentFilter(
            $this->validated()
        );
        $filter->setId(request()->department);

        return $filter;
    }
}
