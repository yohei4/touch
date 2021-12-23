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
            'name' => 'required',
            'pCode' => 'required|max:8',
            'add1' => 'required|max:26',
            'add2' => 'required|max:32',
            'add3' => 'nullable|max:32',
            'tel' => 'required|max:11',
            'logo' => 'file|max:5000|mimes:jpeg,png,jpg',
            'table_count' => 'nullable',
            'comment' => 'nullable|max:500',
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     if (request()->expectsJson()) {
    //         $response['errors']  = $validator->errors()->toArray();

    //         throw new HttpResponseException(
    //             response()->json( $response, 422 )
    //         );
    //     }
    // }
}
