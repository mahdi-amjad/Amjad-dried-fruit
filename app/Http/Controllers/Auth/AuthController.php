<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Cartitem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function RegisterForm()
    {
        return view('Auth.Register');
    }

    public function Register(RegisterRequest $request)
    {
        // بررسی وجود کاربر با ایمیل وارد شده
        $existingUser = User::where('email', $request->email)->first();
        
        // اگر کاربر با این ایمیل وجود نداشت
        if ($existingUser == null) {
            // جمع‌آوری داده‌ها و رمزنگاری پسورد
            $dateform = $request->all();
            $dateform['password'] = Hash::make($request->input('password'));
            
            // اگر username موجود بود، آن را اضافه می‌کنیم
            if ($request->has('username')) {
                $dateform['username'] = $request->input('username');
            }
    
            // ایجاد کاربر جدید
            $user = User::create($dateform);
    
            // ارسال ایمیل تایید به کاربر
            $user->sendEmailVerificationNotification();
    
            // وارد کردن کاربر و هدایت به صفحه خانه
            Auth::login($user);
    
            // هدایت به خانه با پیغام موفقیت
            return redirect()->route('home')->with('success', 'ثبت‌نام با موفقیت انجام شد. لطفاً ایمیل خود را تایید کنید.');
        } else {
            // اگر کاربر با این ایمیل قبلاً وجود داشت
            return redirect()->back()->withErrors(['email' => 'این ایمیل قبلاً ثبت شده است.']);
        }
    }
    
    

    public function LoginForm()
    {
        return view('Auth.Login');
    }

    public function login(LoginRequest $request)
    {
        // تلاش برای ورود با اطلاعات کاربر
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // اگر اطلاعات صحیح بود
            return redirect()->route('home')->with('success', 'ورود با موفقیت انجام شد.');
        } else {
            // اگر اطلاعات اشتباه بود
            return redirect()->back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.']);
        }
    }




}
