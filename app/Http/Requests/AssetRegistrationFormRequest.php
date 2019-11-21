<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRegistrationFormRequest extends FormRequest {

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
            "assetTag" => "required|unique:assets,tag",
            "category" => "required",
            "status" => "required",
            "purchased_date" => "required",
            "purchase_cost" => 'sometimes|nullable|numeric',
            "ordering_point" => 'sometimes|nullable|numeric',
            "lifespan" => "required|numeric",
            "warranty" => "sometimes|nullable|numeric|digits_between:1,2",
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

}
