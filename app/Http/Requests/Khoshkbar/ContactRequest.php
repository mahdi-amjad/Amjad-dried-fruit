<?php

namespace App\Http\Requests\Khoshkbar;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'username'    => 'required|string|max:255',
            'email'   => 'required|email|unique:contacts,email',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
     public function messages()
    {
        return [
            'username.required'    => 'نام و نام خانوادگی الزامی است.',
            'email.required'   => 'ایمیل الزامی است.',
            'email.email'      => 'ایمیل معتبر وارد کنید.',
            'title.required'   => 'موضوع الزامی است.',
            'content.required' => 'پیام الزامی است.',
        ];
    }
}
