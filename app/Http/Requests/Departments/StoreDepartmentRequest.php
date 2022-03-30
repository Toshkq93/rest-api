<?php

namespace App\Http\Requests\Departments;

use App\Filters\Departments\StoreDepartmentFilter;
use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
                'string',
                'required'
            ]
        ];
    }

    /**
     * @return StoreDepartmentFilter
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getFilterDTO(): StoreDepartmentFilter
    {
        return new StoreDepartmentFilter(
            $this->validated()
        );
    }
}
