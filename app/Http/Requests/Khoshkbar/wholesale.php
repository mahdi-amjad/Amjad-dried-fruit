<?php

namespace App\Http\Requests\Khoshkbar;

use Illuminate\Foundation\Http\FormRequest;

class wholesale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'approx_quantity'    => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }
     public function messages()
    {
        return [
            'name.required'    => 'نام و نام خانوادگی الزامی است.',
            'phone.required'    => '   شماره تلفن الزامی است.',
            'approx_quantity.required'   => 'تعداد مورد نیاز الزامی است.',
            'message.required' => 'توضیحات الزامی است.',
        ];
    }
}
