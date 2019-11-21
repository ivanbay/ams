<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetUpdateFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "category" => "required",
            "status" => "required",
            "purchased_date" => "required",
            "purchase_cost" => 'sometimes|nullable|numeric',
            "ordering_point" => 'sometimes|nullable|numeric',
            "depreciation_rate" => "sometimes|nullable|regex:/^\d+(\.\d{1,2})?$/",
            "warranty" => "sometimes|nullable|numeric|digits_between:1,2",
//            "location" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

}
