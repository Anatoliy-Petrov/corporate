<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalcRequest extends FormRequest
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
            'weight' => 'required',
            'category' => 'required',
            'hallmark' => 'required',
            'tariff' => 'required',
            'client_status' => 'required',
            'term' => 'required',
            'amount' => 'required',
            'overpayment' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
//            'images' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'images.*' => 'image|mimes:jpeg,png,jpg,bmp,svg|max:5000'
        ];
    }
}
