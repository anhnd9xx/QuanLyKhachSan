<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
                'name' => 'required|min:2|max:255',
                'parent_id' => 'required|numeric',
                'depth'   => 'required|numeric'
            ];
        }

    public function messages()
        {
            return[
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
                'numeric' => ':attribute Phải là số'
            ];
        }
    public function attributes()
        {
            return[
                'name' => 'Tên danh mục',
                'parent_id' => 'Mục cha',
                'depth' => 'Độ sâu',
            ];
        }
}
