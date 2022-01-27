<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;

class RestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required',
            'postal_code' => ['required', new PostalCodeRule],
            'address_1' => 'required|max:26',
            'address_2' => 'required|max:32',
            'address_3' => 'nullable|max:32',
            'tel' => ['required', new TelRule],
            'logo' => 'nullable|image|max:20000',
            'table_count' => 'nullable',
            'comment' => 'nullable|max:500',
        ];
    }
}
