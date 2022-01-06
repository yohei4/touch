<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'postal_code' => 'required|max:8',
            'address_1' => 'required|max:26',
            'address_2' => 'required|max:32',
            'address_3' => 'nullable|max:32',
            'tel' => 'required|max:11',
            'logo' => 'nullable|image|max:10000',
            'table_count' => 'nullable',
            'comment' => 'nullable|max:500',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (request()->expectsJson()) {
            $response['errors'] = $validator->errors()->toArray();

            throw new HttpResponseException(
                response()->json( $response, 422 )
            );
        }
    }
}
