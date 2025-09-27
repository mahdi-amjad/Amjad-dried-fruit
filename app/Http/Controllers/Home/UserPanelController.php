<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserPanelController extends Controller
{
    // نمایش پروفایل کاربر
    public function dashboard()
    {
        $user = Auth::user();
        $tiket= Ticket::all();
        $tickets = $user->tickets; 
        return view('khoshkbar.Userpanel.user', compact('user','tickets'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $data = $request->only(['name', 'email']);

        $user->update($data);

        // بازگشت به صفحه قبل با پیام موفقیت
        return redirect()->back()->with('success', 'اطلاعات پروفایل شما با موفقیت بروزرسانی شد.');
    }



    // ذخیره رمز جدید
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'رمز عبور فعلی اشتباه است.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'رمز عبور با موفقیت تغییر کرد.');
    }

    public function tiketspost(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subject' => 'required',
            'priority' => 'required',
            'message' => 'required',
        ]);
        Ticket::create([
            'user_id' => Auth::id(),      
            'category' => $request->category,
            'subject' => $request->subject,
            'priority' => $request->priority,
            'message' => $request->message,
        ]);
        return redirect('/user/dashboard');

    }
}
