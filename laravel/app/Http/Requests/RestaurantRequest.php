<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'post_code' => 'required|max:8',
            'address_1' => 'required|max:4',
            'address_2' => 'required|max:12',
            'address_3' => 'required|max:32',
            'address_4' => 'max:32',
            'tel' => 'required|max:11',
            'table_count',
            'comment' => 'max:500',
        ];
    }
}
