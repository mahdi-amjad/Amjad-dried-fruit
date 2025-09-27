<?php

return [
    'required' => ':attribute الزامی است.',
    'email' => ':attribute باید یک ایمیل معتبر باشد.',
    'unique' => ':attribute قبلاً ثبت شده است.',
    'confirmed' => ':attribute با تاییدیه مطابقت ندارد.',
    'min' => [
        'string' => ':attribute باید حداقل :min کاراکتر باشد.',
    ],

    // اضافه کردن پیام‌های خطای مخصوص ایمیل
    'custom' => [
        'email' => [
            'unique' => 'این ایمیل قبلاً ثبت شده است.',
        ],
    ],

    // نام‌گذاری فیلدها
    'attributes' => [
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'password' => 'رمز عبور',
    ],
];

