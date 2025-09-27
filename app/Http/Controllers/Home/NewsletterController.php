<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
          $request->validate([
            'email' => 'required|email|unique:newsletter,email',
        ], [
            'email.required' => 'لطفا ایمیل خود را وارد کنید.',
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.unique' => 'این ایمیل قبلا ثبت شده است.',
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        return back()->with('success', 'ایمیل شما با موفقیت ثبت شد!');
    }
}
