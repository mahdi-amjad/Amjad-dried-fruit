<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'rating'     => 'required|integer|min:1|max:5',
            'message'    => 'required|string',
        ]);

        Review::create([
            'user_id'    => auth()->id(),
            'product_id' => $productId,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'rating'     => $request->rating,
            'message'    => $request->message,
        ]);
      return redirect()->back()->with('success', 'نظر شما با موفقیت ثبت شد ')->withFragment('tab3');
      
    }
}
