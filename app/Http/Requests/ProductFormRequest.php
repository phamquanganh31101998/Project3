<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            //
            'file' => 'image|mimes:jpg,png,gif,jpeg',
            'product_id' =>'unique:product,product_id',
            'short_description' => 'max:50',
            'long_description' => 'max:191',
            'amount' => 'integer',
            'price' => 'integer',
        ];
    }
}
