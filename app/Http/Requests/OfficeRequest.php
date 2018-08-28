<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
            'number' => 'required|integer|max:99999',
            'region_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address_ru' => 'required|max:255',
            'address_uk' => 'required|max:255',
            'phone' => 'required|max:14'
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Номер отделения не должен быть пустым!',
            'number.integer' => 'Номер отделения не должен содержать буквы!',
            'number.max' => 'Номер отделения указан не корректно',
            'region_id.integer' => 'Выберите область!',
            'city_id.integer' => 'Выберите город!',
            'address_ru.required' => 'Адрес (RU) не должен быть пустым!',
            'address_uk.required' => 'Адрес (UA) не должен быть пустым!',
            'phone.required' => 'Укажите телефон!'
        ];
    }
}
