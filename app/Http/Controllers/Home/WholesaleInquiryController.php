<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\WholesaleInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WholesaleInquiryReceived;



class WholesaleInquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'approx_quantity' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ]);


        WholesaleInquiry::create($data);



        return redirect()->back()->with('success', 'درخواست شما ثبت شد، همکاران ما در اسرع وقت تماس می‌گیرند.');
    }
}
