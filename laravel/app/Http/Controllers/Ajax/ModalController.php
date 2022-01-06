<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;

class ModalController extends Controller
{
    public function ajaxCheck(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->__form1rules());

        if ($validator->fails()) {
            return ['status' => 'error', 'errors' => $validator->messages()];
        }
        // $request->validate($this->__form1rules());
        // return $request->all();
    }


    private function __form1rules()
    {
        return [
            'restaurant_name' => ['required', 'max:128'],
            'postal_code' => ['required', new PostalCodeRule],
            'address_1' => ['required', 'max:26'],
            'address_2' => ['required', 'max:32'],
            'address_3' => ['nullable', 'max:32'],
            'tel' => ['required', new TelRule],
        ];
    }

    private function __form2rules()
    {
        return [
            'logo' => 'nullable|image|max:7000',
        ];
    }
}
