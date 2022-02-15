<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'prod_name' => 'required|string|min:5',
            'prod_price' => 'required|numeric',
            'prod_img' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'prod_description' => 'required|string',
            'featured' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }
}
